

//!Crear las peticiones al servidor RETURN TEXT
const  requestText = (uri, campos) => {

    //configurar la peticion. AQUI CONFIGURO LA PETICION
    let configFetch = {
        method: 'POST',
        body: campos,
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    };

    //mandar la peticion
    let promesa = fetch(uri, configFetch);

    //Ejecutar la promesa que devuelve la peticion
    return promesa       
}



const mostarMensaje = (res) => {
  if (res <= 0) {
    Swal.fire({
      title: "Error!",
      text: "Algo fué mal",
      icon: "error",
      confirmButtonText: "Aceptar",
    });
  } else {
    Swal.fire({
      title: "Guardado!",
      text: "Registrado con éxito",
      icon: "success",
      confirmButtonText: "Aceptar",
    });
  }
}

export { requestText, mostarMensaje };
