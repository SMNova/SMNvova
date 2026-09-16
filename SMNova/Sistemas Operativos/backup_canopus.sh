#!/bin/bash
#
# backup_canopus.sh
# Script de respaldo automatizado para la base de datos de Canopus (SGDM).
# Realiza un dump completo de la base MySQL, lo comprime, guarda un log
# y elimina automáticamente los respaldos que superen el período de retención.
#
# Uso manual:   ./backup_canopus.sh
# Uso con cron: ver archivo backup_cron.txt
#

# ============================
# CONFIGURACIÓN
# ============================

DB_NAME="canopus_db"                 # Nombre de la base de datos
DB_USER="canopus_backup"             # Usuario de MySQL con permisos de SELECT/LOCK/SHOW VIEW
DB_PASS_FILE="/etc/canopus/.db_pass" # Archivo con la contraseña (evitar hardcodearla en el script)

BACKUP_DIR="/var/backups/canopus"    # Carpeta donde se guardan los respaldos
LOG_FILE="$BACKUP_DIR/backup.log"    # Log de ejecución
RETENTION_DAYS=7                     # Días que se conservan los respaldos antes de borrarlos

# Si la base corre dentro de un contenedor Docker, poner el nombre del contenedor.
# Dejar vacío ("") si MySQL corre directo en el servidor (sin Docker).
DOCKER_CONTAINER="canopus_mysql"

# ============================
# PREPARACIÓN
# ============================

FECHA=$(date +"%Y-%m-%d_%H-%M-%S")
ARCHIVO="$BACKUP_DIR/${DB_NAME}_${FECHA}.sql.gz"

mkdir -p "$BACKUP_DIR"

log() {
    echo "$(date +"%Y-%m-%d %H:%M:%S") - $1" >> "$LOG_FILE"
}

if [ ! -f "$DB_PASS_FILE" ]; then
    log "ERROR: no se encontró el archivo de contraseña ($DB_PASS_FILE)."
    exit 1
fi

DB_PASS=$(cat "$DB_PASS_FILE")

log "Iniciando respaldo de la base '$DB_NAME'..."

# ============================
# RESPALDO
# ============================

if [ -n "$DOCKER_CONTAINER" ]; then
    # Caso: MySQL corriendo dentro de un contenedor Docker
    docker exec "$DOCKER_CONTAINER" \
        mysqldump -u"$DB_USER" -p"$DB_PASS" --single-transaction --quick --routines --triggers "$DB_NAME" \
        | gzip > "$ARCHIVO"
    RESULTADO=$?
else
    # Caso: MySQL corriendo directo en el servidor
    mysqldump -u"$DB_USER" -p"$DB_PASS" --single-transaction --quick --routines --triggers "$DB_NAME" \
        | gzip > "$ARCHIVO"
    RESULTADO=$?
fi

# ============================
# VALIDACIÓN DEL RESPALDO
# ============================

if [ $RESULTADO -eq 0 ] && [ -s "$ARCHIVO" ]; then
    TAMANIO=$(du -h "$ARCHIVO" | cut -f1)
    log "Respaldo generado correctamente: $ARCHIVO ($TAMANIO)"
else
    log "ERROR: el respaldo falló o el archivo generado está vacío."
    rm -f "$ARCHIVO"
    exit 1
fi

# ============================
# ROTACIÓN DE RESPALDOS ANTIGUOS
# ============================

ELIMINADOS=$(find "$BACKUP_DIR" -name "${DB_NAME}_*.sql.gz" -mtime +"$RETENTION_DAYS" -print -delete | wc -l)

if [ "$ELIMINADOS" -gt 0 ]; then
    log "Se eliminaron $ELIMINADOS respaldo(s) con más de $RETENTION_DAYS días de antigüedad."
fi

log "Proceso de respaldo finalizado."
exit 0
