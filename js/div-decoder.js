async function decodeVIN() {
    // Obtén el valor del campo de texto
    const vinInput = document.getElementById('vinInput').value;

    // Verifica si el campo está vacío
    if (vinInput === '') {
        alert('Por favor, ingresa un VIN antes de continuar.');
        return;
    }

    const url = `https://vindecoder.p.rapidapi.com/v2.0/decode_vin?vin=${vinInput}`;

    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '2cd1fe91ecmshbf0bc17eb12c49dp136231jsnf9eaf1410612',
            'X-RapidAPI-Host': 'vindecoder.p.rapidapi.com'
        }
    };

    console.log(vinInput)
    console.log(url)

    try {
        // Realiza la solicitud a la API con fetch
        const response = await fetch(url, options);
        
        // Verifica si la respuesta es exitosa (código 200)
        if (response.status === 200) {
            const result = await response.json();
            
            console.log(result);
            // Mostrar la respuesta en el elemento 'apiResponse'
            const apiResponseElement = document.getElementById('apiResponse');
            apiResponseElement.innerHTML = generateTable(result.specification);
        } else {
            alert('Hubo un problema al obtener los datos. Por favor, verifica el VIN e inténtalo nuevamente.');
        }
    } catch (error) {
        console.error(error);
        alert('Ocurrió un error al procesar la solicitud. Por favor, inténtalo nuevamente más tarde.');
    }
}

function generateTable(data) {
    let table = '<table class="table">';
    for (const key in data) {
        if (data.hasOwnProperty(key)) {
            table += `<tr><td>${key}</td><td>${data[key]}</td></tr>`;
        }
    }
    table += '</table>';
    return table;
}

const decodeButton = document.querySelector('button');
