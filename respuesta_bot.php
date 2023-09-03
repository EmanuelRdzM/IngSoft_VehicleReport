<?php
$botToken = '6023022504:AAFZrUaXtWLhaTSIwn8ErrOGKA27VKJuSF8';
session_start();
$chatId = $_SESSION['idchaat'];
$folio = $_SESSION['fol'];
$id_us = $_SESSION['id_us'];

//$chatId = $_POST['idchat'];
$estatus = $_POST['status'];
$marca = $_POST['marca'];
$ano = $_POST['año'];
$color = $_POST['color'];
$ter = $_POST['ter'];
$placa = $_POST['placa'];
$serie = $_POST['serie'];
$analista = $_POST['analista'];



// Construir la URL de la API de Telegram
$url = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';

// Configurar los datos del mensaje
$data = array(
    'chat_id' => $chatId,
    'text' => 'Estatus del vehiculo: '.$estatus."\nMarca y modelo: ".$marca."\nAño: ".$ano."\nColor: ".$color."\nTerminacion de serie: ".$ter."\nPlaca: ".$placa."\nSerie del motor: ".$serie."\nAnalista: ".$analista."\n\n\nRespuesta de consulta validado por Subdirección de Despacho C4 Municipal\n\nFolio de consulta: ".$folio
);

// Realizar la solicitud POST a la API de Telegram
$options = array(
    'http' => array(
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

// Verificar el resultado de la solicitud
if ($result === false) {
    echo 'Error al enviar el mensaje';
} else {
    echo 'Mensaje enviado con éxito';
}


// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plataforma_consultas2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "UPDATE datos_c SET estatus = 'procesada' WHERE id_dc = $folio";
if ($conn->query($sql) === TRUE) {
    echo "Inserción exitosa";
    
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

$conn2 = new mysqli($servername, $username, $password, $dbname);
if ($conn2->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "INSERT INTO datos_r (id_c, id_u, marca_modelo, ter_serie, placa, s_motor, estatus, id_chat, año) VALUES ($folio, $id_us, '$marca', '$ter', '$placa', '$serie', '$estatus','$chatId', '$ano')";
if ($conn2->query($sql) === TRUE) {
    echo "Inserción exitosa";
    
} else {
    echo "Error al insertar datos: " . $conn2->error;
}

// Cerrar la conexión
$conn2->close();
?>





