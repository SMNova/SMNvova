// Formulario de login
const formulario = document.querySelector('form');

if (formulario) {
  formulario.addEventListener('submit', function(e) {

    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Si algún campo está vacío, muestra error
    if (email === '' || password === '') {
      alert('Por favor completá todos los campos');
      return;
    }

    // Si los dos campos tienen algo, muestra éxito
    alert('¡Bienvenid/a a CANOPUS!');
  });
}
// Filtro de búsqueda en la página de torneos
const inputbusqueda = document.getElementById('input-busqueda');
const tarjetas = document.querySelectorAll('.tarjeta-torneo');

if (inputbusqueda) {
  inputbusqueda.addEventListener('input', function() {
    const texto = inputbusqueda.value.toLowerCase(); // lo que escribió el usuario, en minúsculas

    tarjetas.forEach(function(tarjeta) {
      // toLowerCase() para que no importe si escriben mayúscula o minúscula
      const contenido = tarjeta.textContent.toLowerCase();

      if (contenido.includes(texto)) {
        tarjeta.style.display = 'block';   // si coincide, se muestra
      } else {
        tarjeta.style.display = 'none';    // si no coincide, se oculta
      }
    });
  });
}
// activa y desactiva el menú en movil
function menuMovil() {
  var x = document.getElementById("menu");
  if (x.style.display === "flex") {
    x.style.display = "none";
  } else {
    x.style.display = "flex";
  }
}