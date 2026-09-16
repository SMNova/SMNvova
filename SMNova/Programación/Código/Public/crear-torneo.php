<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="estilos.css">
  <title>SMNOVA — Crear torneo</title>
</head>
<body>

  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="index.html">
          <img src="logo.png" alt="Logo SMNova" height="60">
        </a>
      </div>
      <div class="nav-derecha">
        <button class="hamburguesa" id="btn-menu" onclick="menuMovil()">☰</button>
        <ul class="menu" id="menu">
          <li><a href="perfil-usuario.html">Perfil de muestra</a></li>
          <li><a href="torneos.html">Torneos</a></li>
          <li><a href="como-funciona.html">Manual</a></li>
          <li><a href="contacto.html">Contacto</a></li>
        </ul>
        <a href="login.html" class="btn-login">Iniciar sesión</a>
      </div>
    </nav>
  </header>

  <main>

    <!-- formularo de creacion  -->
    <section class="crear">
      <div class="tarjeta-crear">
        <h2>Crear torneo</h2>

        <form>

          <div class="espacio">
            <label for="name">Nombre del torneo</label>
            <input type="text" id="name" placeholder="Nombre del torneo">
          </div>

          <div class="espacio">
            <label for="numero">Cantidad de participantes</label>
            <input type="number" id="numero" placeholder="Ej: 8">
          </div>

          <div class="espacio">
            <label for="fecha">Fecha de inicio</label>
            <!-- type="date" muestra un selector de calendario -->
            <input type="date" id="fecha">
          </div>

          <div class="espacio">
            <label for="disciplina">Disciplina</label>
            <!-- <select> permite elegir una opción de una lista,literalmente -->
            <select id="disciplina">
              <option value="">Seleccioná una disciplina</option>
              <option value="futbol">Fútbol</option>
              <option value="voleyball">Voleyball</option>
              <option value="ajedrez">Ajedrez</option>
              <option value="videojuegos">Videojuegos</option>
              <option value="cartas">Cartas</option>
            </select>
          </div>

          <!--como funciona el formato:
               liga = todos contra todos
               eliminacion = llave, perdés y salís
               suizo = se empareja según rendimiento acumulado -->
          <div class="espacio">
            <label for="formato">Formato de competencia</label>
            <select id="formato">
              <option value="">Seleccioná un formato</option>
              <option value="liga">Liga (todos contra todos)</option>
              <option value="eliminacion">Eliminación directa</option>
              <option value="suizo">Sistema suizo</option>
            </select>
          </div>

          <button type="submit" class="btn-ingresar">Crear torneo</button>

        </form>
      </div>
    </section>

  </main>

  <footer class="footer">
    <div class="footer-logo">SMNOVA</div>
    <div class="footer-links">
      <a href="contacto.html">Contacto</a>
      <a href="como-funciona.html">Manual</a>
      <span>Instituto Tecnológico Superior Arias-Balparda</span>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>
