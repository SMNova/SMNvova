
#!/bin/bash
menu(){
clear
echo "Bienvenido al Sistema SMNova"
echo "1-Crear Usuario"
echo "2-Listar Usuarios"
echo "3-Modificar Usuarios"
echo "4-Eliminar Usuario"
echo "5-Salir"
echo "Ingrese una opción: "
read op
case $op in
 1)crearusuario;;
 2)listarusuario;;
 3)modificarusuario;;
 4)eliminarusuario;;
 5)salir;;
 *)inv;;
esac
}
crearusuario(){
 clear
 echo "Introduce el nombre del nuevo usuario:"
 read username
 if id "$username" &>/dev/null
 then
  echo "El usuario ya existe, volviendo al menú"
  sleep 3
  menu
 else
  echo "Elija el tipo de usuario"
  echo "1-Administrador general"
  echo "2-Gestor de base de datos"
  echo "3-Gestor de Apache"
  echo "4-Gestor de Docker"
  read op
  case $op in
   1) groupname="Admin";;
   2) groupname="GestorBD";;
   3) groupname="GestorApache";;
   4) groupname="GestorDocker";;
   *) inv;;
  esac
  sudo useradd -s /bin/bash -g $groupname -m $username
  sudo passwd $username
  sudo chage -M 28 $username
  sudo chage -W 14 $username
  sudo chage -I 5 $username
  echo "Usuario $username creado correctamente."
  sleep 3
  menu
 fi
}
listarusuario(){
 clear
 echo "Usuarios actualmente registrados:"
 cut -d: -f1 /etc/passwd
 sleep 1
 echo "Presione cualquier tecla para continuar"
 read -n 1 tecla
 menu
}
modificarusuario(){
 clear
 echo "Ingrese el nombre del usuario que desea modificar:"
 read usuario
 if ! id "$usuario" &>/dev/null
 then
  echo "El usuario no existe para ser modificado, volviendo al menú."
  sleep 3
  menu
 else
  echo "Ingrese que parametro quiera modificar."
  echo "1-Tipo de usuario."
  echo "2-Grupo secundario."
  echo "3-Comentarios."
  echo "4-Nombre del usuario."
  echo "5-Contraseña del usuario"
  echo "6-Bloquear cuenta."
  echo "7-Desbloquear cuenta."
  echo "8-Volver al menú."
  read op
  case $op in
   1)grupousuario;;
   2)gruposecundario;;
   3)comentarios;;
   4)nombreusuario;;
   5)contrasena;;
   6)bloquearcuenta;;
   7)desbloquearcuenta;;
   8)menu;;
   *)inv;;
  esac
 fi
}
grupousuario(){
 echo "Elija el tipo de usuario"
 echo "1-Administrador general"
 echo "2-Gestor de base de datos"
 echo "3-Gestor de Apache"
 echo "4-Gestor de Docker"
 read op
 case $op in
  1) groupname="Admin";;
  2) groupname="GestorBD";;
  3) groupname="GestorApache";;
  4) groupname="GestorDocker";;
  *) inv;;
 esac
 sudo usermod -g $groupname $usuario
 echo "Usuario modificado."
 sleep 2
 menu
}
gruposecundario(){
 echo "Elija el tipo de usuario"
 echo "1-Administrador general"
 echo "2-Gestor de base de datos"
 echo "3-Gestor de Apache"
 echo "4-Gestor de Docker"
 read op
 case $op in
  1) groupname="Admin";;
  2) groupname="GestorBD";;
  3) groupname="GestorApache";;
  4) groupname="GestorDocker";;
  *) inv;;
 esac
 echo "1-añadir grupo secundario."
 echo "2-reescribir grupos secundarios por el grupo seleccionado."
 read -n 1 op
 case $op in
  1) sudo usermod -a -G $groupname $usuario;;
  2) sudo usermod -G $groupname $usuario;;
  *) inv;;
 esac
 echo "usuario modificado."
 sleep 2
 menu
}
comentarios(){
echo "Ingrese el comentario o nombre completo del usuario."
 read com
 sudo usermod -c "$com" $usuario
 echo "usuario modificado."
 sleep 2
 menu
}
nombreusuario(){
 echo "Ingrese el nuevo nombre del usuario."
 echo "Ten en cuenta que esto también cambiará el nombre de su directorio"
 read nuevousuario
 sudo usermod -l $nuevousuario -d /home/$nuevousuario -m $usuario
 sudo passwd $nuevousuario
 sudo chage -M 28 $nuevousuario
 sudo chage -W 14 $nuevousuario
 sudo chage -I 5 $nuevousuario
 echo "usuario modificado."
 sleep 2
 menu
}
contrasena(){
 echo "Ingrese la nueva contraseña del usuario."
 sudo passwd $usuario
 echo "Contraseña modificada."
 sleep 2
 menu
}
bloquearcuenta(){
 sudo chage -E 1 $usuario
 echo "cuenta del usuario bloqueada correctamente."
 sleep 3
 menu
}
desbloquearcuenta(){
 sudo chage -E -1 $usuario
 echo "cuenta del usuario desbloqueada correctamente."
 sleep 3
 menu
}
eliminarusuario(){
 clear
 echo "Ingrese el nombre del usuario que deseas eliminar:"
 read username
 if ! id "$username" &>/dev/null
 then
  echo "El usuario no existe para ser eliminado, volviendo al menú."
  sleep 3
  menu
 else
  sudo userdel -r $username
  echo "Usuario $username eliminado con éxito."
  sleep 3
  menu
 fi
}
salir(){
 echo "Saliendo..."
 sleep 3
}
inv(){
echo "Opcion invalida, volviendo al menú"
sleep 3
menu
}
menu
