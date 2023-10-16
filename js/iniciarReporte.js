async function getInfoCar(vinInput) {    
    const url = `https://vindecoder.p.rapidapi.com/v2.0/decode_vin?vin=${vinInput}`;

    console.log(url);
    console.log(vinInput);

    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': 'API-KEY',
            'X-RapidAPI-Host': 'vindecoder.p.rapidapi.com'
        }
    };

    try {
        const response = await fetch(url, options);
        
        // Verifica si la respuesta es exitosa (código 200)
        if (result && result.specification) {
            const carInfo = result.specification;
            const message = `Vehiculo: ${carInfo.model} - ${carInfo.make} ${carInfo.style}\nTransmission: ${carInfo.transmission}`;
            if (confirm(`Información del coche:\n${message}\n\n¿Deseas continuar?`)) {
    
                const datosVehiculo = {
                    vin: vinInput,
                    year: carInfo.year,
                    model: carInfo.model,
                    make: carInfo.make,
                    style: carInfo.style,
                    overall_length: carInfo.overall_length,
                    overall_height: carInfo.overall_height,
                    overall_width: carInfo.overall_width,
                    standard_seating: carInfo.standard_seating,
                    made_in: carInfo.made_in,
                    steering_type: carInfo.steering_type,
                };
    
                generarInforme(datosVehiculo);
            }
        } else {
            alert('No se encontró información para ese VIN.');
        }
    } catch (error) {
        console.error(error);
        alert('Ocurrió un error al procesar la solicitud. Por favor, inténtalo nuevamente más tarde.');
    }
}

function generarInforme(datos) {
    //'http://localhost:3000/api/guardarInforme'
    fetch('/api/guardarInforme', { 
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(datos),
    })
      .then(response => response.json())
      .then(data => {
        console.log(data); // Manejar la respuesta del servidor
      })
      .catch(error => {
        console.error('Error al enviar datos al servidor:', error);
      });
}
  

function validarFormulario() {
    const nombreUsuario = document.getElementById('nombreUsuario').value;
    const motivo = document.getElementById('motivo').value;
    const numeroIdentificador = document.getElementById('numeroIdentificador').value;

    if (!nombreUsuario || !motivo || !numeroIdentificador) {
        alert('Todos los campos son obligatorios.');
        return;
    }

    getInfoCar(numeroIdentificador);
    
}
