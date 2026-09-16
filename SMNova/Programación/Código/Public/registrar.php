<!DOCTYPE html>
<html lang="es">
<head>
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link rel="stylesheet" href="estilos.css">
            <title>Página web de SMNova</title>
</head>
<body>

         <nav class="navbar">
            <div class="logo">
            <a href="index.html">   
            <img src="logo.png" alt="" height="100">
            </a> 
            </div>
            <div class="nav-derecha">
              <button class="hamburguesa" id="btn-menu">☰</button>
            <ul class="menu">
               <li><a href="torneos.html">Torneos</a></li>
               <li><a href="como-funciona.html">Manual</a></li>
               <li><a href="contacto.html">Contacto</a></li>
            </ul>
           <a href="login.html" class="btn-login">Iniciar sesión</a>
            </div>
            
</nav>   
<section class="login">
  <div class="tarjetalogin">
    <h2>Iniciar sesión</h2>

    <form id="registroForm" method="POST" action="registrar.php">

        <div class="espacio">
        <label for="Nombre">Nombre</label>
        <!-- El atributo 'name' es necesario para enviar los datos del formulario -->
        <input type="text" id="Nombre" name="nombre" placeholder="Tu nombre" required>
      </div>

      <div class="espacio">
        <label for="Apellido">Apellido</label>
        <input type="text" id="Apellido" name="apellido" placeholder="Tu apellido" required>
      </div>

      <div class="espacio">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="tu@email.com" required>
      </div>

      <div class="espacio">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Tu contraseña" required>
      </div>

      <input type="hidden" name="id_rol" value="1">

      <button type="submit" class="btn-ingresar">Registrarse</button>

    </form>

    <p class="registro">¿Ya tienes cuenta? <a href="login.html">Inicia Sesión!</a></p>

  </div>
</section>
</body>
<script src="script.js"></script>
<script>
  // == MANEJO DEL FORMULARIO DE REGISTRO ==
  // fuera del bloque de script.js para evitar conflictos con otros scripts ya que el script de registro es específico para esta página
  const formulario = document.getElementById('registroForm');

  if (formulario) {
    formulario.addEventListener('submit', async (evento) => {
      evento.preventDefault();

      // Recopilamos los datos del formulario
      const datosFormulario = new FormData(evento.target);
      const datos = Object.fromEntries(datosFormulario);

      try {
        // Enviamos los datos al backend
        const respuesta = await fetch('../Api/api_registrar.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(datos)
        });

        // Obtenemos la respuesta del servidor
        const resultado = await respuesta.json();

        if (respuesta.ok) {
          alert('¡Registro exitoso! Redirigiendo al login...');
          // Redirigimos al login después de 1.5 segundos
          setTimeout(() => {
            window.location.href = 'login.html';
          }, 1500);
        } else {
          // Mostramos el error que retornó el servidor
          alert('Error: ' + resultado.mensaje);
        }
      } catch (error) {
        console.error('Error:', error);
        alert('Error al conectar con el servidor');
      }
    });
  }
</script>
</html>
   