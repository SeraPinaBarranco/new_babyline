let ip = document.getElementById('ip')
let db = document.getElementById('db')
let usuario = document.getElementById('usuario')
let clave = document.getElementById('clave')
let pais = document.getElementById('pais')
let cojer = document.getElementById('cojer')
let tabla = document.getElementById('tabla')
let table = document.getElementById('table')

document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario

    // Validar los campos del formulario
    if (validateForm()) {
      // Obtener los valores del formulario

      // Realizar la petición Fetch al archivo PHP
      fetch('./model/class_BD_remota.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'ip=' + encodeURIComponent(ip.value) +
              '&db=' + encodeURIComponent(db.value) +
              '&usuario=' + encodeURIComponent(usuario.value) +
              '&clave=' + encodeURIComponent(clave.value) +
              '&pais=' + encodeURIComponent(pais.value) +
              '&cojer=' + encodeURIComponent(cojer.value) +
              '&tabla=' + encodeURIComponent(tabla.value)
      })
      .then(function(response) {
        return response.text();
      })
      .then(function(data) {
        console.log(data); // Aquí puedes hacer algo con la respuesta del servidor
      })
      .catch(function(error) {
        console.log('Error:', error);
      });
    }
  });

  function validateForm() {
    console.log(ip.value)
                            
    if (ip === '' || db === '' || usuario === '' || clave === '' || pais === '' || cojer === '' || tabla === '') {
      alert('Por favor, completa todos los campos.');
      return false;
    }

    updateTable()
    return true;
  }

  

  function updateTable() {
    // Obtener los datos de la base de datos mediante una petición Fetch
    fetch('./model/class_getBD_remota.php')
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // Crear la tabla con los datos
        new Tabulator("#table", {
          data: data, // Aquí debes proporcionar los datos en formato de matriz JSON
          layout: "fitColumns",
          columns: [
            { title: "ID", field: "id" },
            { title: "IP", field: "ip" },
            { title: "Base de datos", field: "db" },
            { title: "Usuario", field: "usuario" },
            { title: "País", field: "pais" },
            { title: "Cojer", field: "cojer" },
            { title: "Tabla", field: "tabla" }
          ]
        });
      })
      .catch(function(error) {
        console.log('Error:', error);
      });
  }

  updateTable()