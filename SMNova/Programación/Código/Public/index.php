<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="estilos.css">
  <title>SMNOVA - Organizá tus torneos</title>
</head>
<body>

  <!--
       El header deberían saber q es -->
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="index.html">
          <img src="logo.png" alt="Logo SMNova" height="60">
        </a>
      </div>
      <div class="nav-derecha">
        <!-- botón hamburguesa: visible solo en celular,
             al tocarlo muestra/oculta el menú con JS -->
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

  <!--main — contenido principal de la página
       Todo lo que no es nav ni footer va acá-->
  <main>

    <!-- hero: primera sección visible, presenta la app
         Tiene título, descripción y dos botones de acción -->
    <section class="hero">
      <h1>Organizá tus torneos</h1>
      <p>Liga, eliminación directa o sistema suizo. Fútbol, ajedrez, e-sports o lo que organices. Un solo lugar para llevar la cuenta.</p>
      <div class="hero-botones">
        <a href="torneos.html" class="btn-buscar">Buscar un torneo</a>
        <a href="crear-torneo.html" class="btn-crear">Crear el mío</a>
      </div>
    </section>

    <!-- torneos activos: muestra los torneos en curso
         Cada tarjeta es un <article> porque es contenido
         independiente que tiene sentido por sí solo.
         En la segunda entrega esperamos que estos datos vengan de la bd y php -->
    <section class="torneos-activos">
      <div class="seccion-header">
        <h2>Torneos activos</h2>
        <a href="torneos.html">Ver todo →</a>
      </div>

      <div class="contenedor-tarjetas">

        <!-- tarjeta completa clickeable: toda la tarjeta lleva al detalle -->
        <a href="detalle-torneo.html" class="link-tarjeta">
          <article class="tarjeta">
            <span class="sport">Voleyball</span>
            <h3>Liga Livo Sur</h3>
            <p>32 equipos · Fecha 4 de 12</p>
            <span class="curso">● En curso</span>
          </article>
        </a>

        <!-- esta tarjeta tiene dos acciones: ver detalle e inscribirse.
             Como no se puede poner un <a> dentro de otro <a>,
             solo el título es link al detalle y el botón es aparte -->
        <article class="tarjeta">
          <span class="sport">Ajedrez</span>
          <h3><a href="detalle-torneo.html" class="link-titulo">Copa Apertura</a></h3>
          <p>18 jugadores · Sistema suizo</p>
          <span class="abierto">Inscripciones abiertas</span>
          <a href="inscripcion.html" class="btn-inscribir-mini">Inscribirme</a>
        </article>

        <a href="detalle-torneo.html" class="link-tarjeta">
          <article class="tarjeta">
            <span class="sport">Videojuegos</span>
            <h3>Regional FIFA26</h3>
            <p>5 equipos · Eliminación directa</p>
            <span class="proximo">Próximamente</span>
          </article>
        </a>

      </div>
    </section>

    <!-- los pasitos: explica el proceso en 5 pasos
         Los círculos con números se hacen con border-radius: 50% en CSS -->
    <section class="como-funciona">
      <h2>¿Cómo funciona?</h2>
      <div class="pasos">
        <div class="paso">
          <div class="numero">1</div>
          <h3>Creá tu torneo</h3>
          <p>Elegí disciplina y formato: liga, llave o suizo.</p>
        </div>
        <div class="paso">
          <div class="numero">2</div>
          <h3>Sumá participantes</h3>
          <p>Inscribí equipos o jugadores uno por uno o todos juntos.</p>
        </div>
        <div class="paso">
          <div class="numero">3</div>
          <h3>Generá los enfrentamientos</h3>
          <p>El sistema arma el calendario automáticamente.</p>
        </div>
        <div class="paso">
          <div class="numero">4</div>
          <h3>Cargá resultados</h3>
          <p>Las tablas y posiciones se actualizan al instante.</p>
        </div>
        <div class="paso">
          <div class="numero">5</div>
          <h3>Compartí todo</h3>
          <p>Participantes y público consultan calendario y resultados.</p>
        </div>
      </div>
    </section>

  </main>

  <!-- footer: pie de página con logo y links -->
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
