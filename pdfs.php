<?php
    //require('pdf/fpdf.php');
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="plataforma_consultas2";






$cuanto=14;
       
    for($a=0;$a<=$cuanto;$a++){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['boton'.$a.'']) && $_POST['boton'.$a.''] === 'opcion'.$a.'') {
                $solicitud=$a;
            }
    }
}
$conexion = mysqli_connect("localhost", "root", "") or die("Problemas en la conexión");
if ($conexion) {
    mysqli_select_db($conexion, "plataforma_consultas2") or die("Problemas en la base de datos");
    $query = "SELECT * FROM datos_r JOIN datos_c JOIN bot_users ON datos_r.id_c = datos_c.id_dc WHERE id_c=" . $solicitud . " AND bot_users.id = datos_r.id_u; ";
    $registros = mysqli_query($conexion, $query) or die("Problemas en la consulta");

    require('pdf/fpdf.php'); // Asegúrate de tener el archivo FPDF incluido

    $pdf = new FPDF('L', 'mm', 'A4');

    // Agregar una página
    $pdf->AddPage();

    // Establecer el título de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Datos de consulta', 0, 1, 'C');
    $pdf->Ln(10);

    // Configurar el estilo de la tabla
    $pdf->SetFillColor(220, 220, 220);
    $pdf->SetTextColor(0);
    $pdf->SetFont('', 'B');

    // Imprimir los encabezados de la tabla
    $pdf->Cell(30, 10, 'Folio: ', 1, 0, 'C', 1);
    $pdf->Cell(40, 10, 'Marca y modelo ', 1, 0, 'C', 1);
    $pdf->Cell(40, 10, 'Placa', 1, 0, 'C', 1);
    $pdf->Cell(40, 10, 'Serie del motor', 1, 0, 'C', 1);
    $pdf->Cell(50, 10, 'Motivo de la consulta', 1, 0, 'C', 1);
    $pdf->Cell(40, 10, 'Oficial', 1, 0, 'C', 1);
    $pdf->Cell(40, 10, 'Nomina', 1, 1, 'C', 1);
   

   



    // Imprimir los datos de la tabla
    $pdf->SetFont('', '');
    while ($row = mysqli_fetch_assoc($registros)) {
        $id_consulta = $row['id_c'];
        $datos = $row['marca_modelo'];
        $placa = $row['placa'];
        $serie_motor = $row['s_motor'];
        $motivo = $row['motivo'];
        $oficial = $row['nombre'];
        $nomina = $row['nomina'];
        $fecha = $row['fecha_hora'];
        $ag = $row['agrupamiento'];
        $stat = $row['estatus'];
        $ubi = $row['ubi'];

        $pdf->Cell(30, 10, $id_consulta, 1, 0, 'C');
        $pdf->Cell(40, 10, $datos, 1, 0, 'C');
        $pdf->Cell(40, 10, $placa, 1, 0, 'C');
        $pdf->Cell(40, 10, $serie_motor, 1, 0, 'C');
        $pdf->Cell(50, 10, $motivo, 1, 0, 'C');
        $pdf->Cell(40, 10, $oficial, 1, 0, 'C');
        $pdf->Cell(40, 10, $nomina, 1, 1, 'C');

        $pdf->SetFillColor(220, 220, 220);
        $pdf->SetTextColor(0);
        $pdf->SetFont('', 'B');
        $pdf->Ln(5);
        $pdf->Cell(40, 10, 'Fecha y hora', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Agrupamiento', 1, 0, 'C', 1);
        $pdf->Cell(50, 10, 'Estatus del vehiculo', 1, 0, 'C', 1);
        $pdf->Cell(90, 10, 'Ubicacion', 1, 1, 'C', 1);
        $pdf->Cell(40, 10, $fecha, 1, 0, 'C');
        $pdf->Cell(40, 10, $ag, 1, 0, 'C');
        $pdf->Cell(50, 10, $stat, 1, 0, 'C');
        $pdf->Cell(90, 10, $ubi, 1, 1, 'C');
    }

    mysqli_close($conexion);

    // Generar el archivo PDF
    $pdf->Output();
}

//
