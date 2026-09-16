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
           <a href="login.php" class="btn-login">Iniciar sesión</a>
            </div>
            
</nav>   
<section class="login">
  <div class="tarjetalogin">
    <h2>Iniciar sesión</h2>

    <form id="loginForm" method="POST">

      <div class="espacio">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="tu@email.com" required>
      </div>

      <div class="espacio">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Tu contraseña" required>
      </div>

      <button type="submit" class="btn-ingresar">Iniciar sesión</button>

    </form>

    <p class="registro">¿No tienes cuenta? <a href="registrar.php">¡Regístrate!</a></p>

  </div>
</section>
</body>
<script src="script.js"></script>
</html>