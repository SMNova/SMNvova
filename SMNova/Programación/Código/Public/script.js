// ===== VERIFICACIÓN DE SESIÓN AL CARGAR LA PÁGINA =====
// Comprobamos si el usuario está autenticado y actualizamos el navbar

document.addEventListener('DOMContentLoaded', async () => {
  // Verificamos la sesión del usuario
  verificarSesion();
  
  // Configuramos otros event listeners
  configurarMenuMovil();
  configurarFormularioLogin();
  configurarBusquedaTorneos();
});

// Función para verificar si el usuario está autenticado
async function verificarSesion() {
  try {
    const respuesta = await fetch('verificar_sesion.php');
    const datos = await respuesta.json();
    
    if (datos.autenticado) {
      // El usuario está autenticado
      actualizarNavbarAutenticado(datos.usuario);
    } else {
      // El usuario NO está autenticado
      actualizarNavbarNoAutenticado();
    }
  } catch (error) {
    console.error('Error al verificar sesión:', error);
    actualizarNavbarNoAutenticado();
  }
}

// Actualiza el navbar cuando el usuario ESTÁ autenticado
function actualizarNavbarAutenticado(usuario) {
  const btnLogin = document.querySelector('.btn-login');
  
  if (btnLogin) {
    // Reemplazamos el botón "Iniciar sesión" con el perfil del usuario
    btnLogin.innerHTML = `${usuario.nombre} ${usuario.apellido}`;
    btnLogin.href = 'perfil-usuario.html';
    btnLogin.classList.add('btn-perfil'); // Agregamos una clase CSS diferente
    
    // Agregamos un botón de logout cerca
    const btnLogout = document.createElement('a');
    btnLogout.href = '#';
    btnLogout.classList.add('btn-logout');
    btnLogout.textContent = 'Cerrar sesión';
    btnLogout.onclick = (e) => {
      e.preventDefault();
      cerrarSesion();
    };
    
    btnLogin.parentElement.insertBefore(btnLogout, btnLogin.nextSibling);
  }
}

// Actualiza el navbar cuando el usuario NO está autenticado
function actualizarNavbarNoAutenticado() {
  const btnLogin = document.querySelector('.btn-login');
  
  if (btnLogin) {
    // Aseguramos que tenga el estilo correcto
    btnLogin.classList.remove('btn-perfil');
    btnLogin.textContent = 'Iniciar sesión';
    btnLogin.href = 'login.html';
  }
  
  // Eliminamos el botón de logout si existe
  const btnLogout = document.querySelector('.btn-logout');
  if (btnLogout) {
    btnLogout.remove();
  }
}

// Función para cerrar sesión
async function cerrarSesion() {
  try {
    // Hacemos logout (opcional, podemos hacer POST a logout.php)
    await fetch('logout.php');
    
    // Redirigimos al home
    window.location.href = 'index.html';
  } catch (error) {
    console.error('Error al cerrar sesión:', error);
    alert('Error al cerrar sesión');
  }
}

// ===== FORMULARIO DE LOGIN =====
function configurarFormularioLogin() {
  const formulario = document.querySelector('form');

  if (formulario && formulario.id === 'loginForm') {
    formulario.addEventListener('submit', async function(e) {
      e.preventDefault();

      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value.trim();

      // Validamos que ambos campos tengan contenido
      if (email === '' || password === '') {
        alert('Por favor completá todos los campos');
        return;
      }

      try {
        // Enviamos las credenciales al backend
        const respuesta = await fetch('../Api/api_login.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ email, password })
        });

        const resultado = await respuesta.json();

        if (respuesta.ok) {
          alert('¡Bienvenid/a a CANOPUS!');
          // Redirigimos a la página principal después de 1 segundo
          setTimeout(() => {
            window.location.href = 'index.html';
          }, 1000);
        } else {
          alert('Error: ' + resultado.mensaje);
        }
      } catch (error) {
        console.error('Error:', error);
        alert('Error al conectar con el servidor');
      }
    });
  }
}

// ===== FILTRO DE BÚSQUEDA DE TORNEOS =====
function configurarBusquedaTorneos() {
  const inputbusqueda = document.getElementById('input-busqueda');
  const tarjetas = document.querySelectorAll('.tarjeta-torneo');

  if (inputbusqueda) {
    inputbusqueda.addEventListener('input', function() {
      const texto = inputbusqueda.value.toLowerCase();

      tarjetas.forEach(function(tarjeta) {
        const contenido = tarjeta.textContent.toLowerCase();

        if (contenido.includes(texto)) {
          tarjeta.style.display = 'block';
        } else {
          tarjeta.style.display = 'none';
        }
      });
    });
  }
}

// ===== MENÚ MÓVIL =====
function configurarMenuMovil() {
  const btnMenu = document.getElementById('btn-menu');
  const menu = document.getElementById('menu');

  if (btnMenu && menu) {
    btnMenu.addEventListener('click', function() {
      if (menu.style.display === 'flex') {
        menu.style.display = 'none';
      } else {
        menu.style.display = 'flex';
      }
    });
  }
}

  // ===== MANEJO DEL FORMULARIO DE REGISTRO =====
  
  // Seleccionamos el formulario por su ID
  const formularioRegistro = document.getElementById('registroForm');

  // Agregamos un event listener para cuando se envíe el formulario
  // 'submit' se dispara cuando el usuario hace click en el botón "Ingresar"
  formularioRegistro.addEventListener('submit', async (evento) => {
    
    // Prevenimos el comportamiento por defecto del formulario
    // (que es recargar la página y enviar datos de forma tradicional)
    evento.preventDefault();

    // Creamos un objeto FormData para recopilar todos los datos del formulario
    // Esto automáticamente recoge todos los campos con atributo 'name'
    const datosFormulario = new FormData(evento.target);

    // Convertimos FormData a un objeto JSON para enviar al servidor
    // Object.fromEntries convierte los pares clave-valor en un objeto JavaScript
    const datos = Object.fromEntries(datosFormulario);

    try {
      // Enviamos los datos al backend usando Fetch API
      // POST: método que envía datos al servidor
      // Headers: indicamos que enviamos JSON
      // body: convertimos el objeto a JSON con JSON.stringify()
      const respuesta = await fetch('../SMNova/index.php?action=registrar', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(datos)
      });

      // Verificamos si la respuesta del servidor fue exitosa (código 200-299)
      if (respuesta.ok) {
        // Si todo salió bien, mostramos un mensaje de éxito
        alert('¡Registro exitoso! Redirigiendo...');
        // Redirigimos al usuario a la página de login después de 1.5 segundos
        setTimeout(() => {
          window.location.href = 'login.html';
        }, 1500);
      } else {
        // Si hay error en la respuesta del servidor
        const errorData = await respuesta.json();
        alert('Error en el registro: ' + (errorData.mensaje || 'Intenta de nuevo'));
      }
    } catch (error) {
      // Si hay un error en la conexión o en el envío
      // 'catch' captura cualquier excepción que ocurra en el try
      console.error('Error en la solicitud:', error);
      alert('Error al conectar con el servidor. Por favor, intenta más tarde.');
    }
  });