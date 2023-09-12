<?php

echo "<style>
.container {
    display: flex;
    flex-wrap: wrap;
  }
  
  .div-izquierdo {
    width: 50%;
    float: left;
    <!--background-color: #7affd9;-->
    background-color: white;

  }
  
  .div-derecho {
    width: 50%;
    float: right;
    background-color: #add8e6;
  }
  
  @media screen and (max-width: 768px) {
    .div-izquierdo, .div-derecho {
      width: 100%;
      float: none;
    }
  }

  .btn1 {
    display: inline-block;
    background-color: #0095b6;
    padding: 15px;
    color white;
    text-transform: uppercase;
    text-decoration: none;
    margin: 15px;
    font-weight: 700;
  }
</style>";

        $cuanto=18;
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS motivo FROM datos_c;";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto = $cuanto + $tupla['motivo']; 
                }
                mysqli_close($conexion); 
            }
    for($a=0;$a<=$cuanto;$a++){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['boton'.$a.'']) && $_POST['boton'.$a.''] === 'opcion'.$a.'') {
                $solicitud=$a;
            }
    }
}
$conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT". "*"." FROM datos_c JOIN bot_users ON datos_c.id_us= bot_users.id WHERE id_dc=".$solicitud.";";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                    $id = $tupla['id_chat'];
                    $folio = $tupla['id_dc'];
                    $id_us = $tupla['id_us'];
                    echo    "<div class='container'> 
                    <div class='div-izquierdo'>
                    <h1>Informacion de la solicitud de consulta</h1>
                    <br>
                    <p>Agrupamiento:".$tupla['agrupamiento']." </p>
                    <p>Motivo de la consulta: ".$tupla['motivo']."</p>
                    <p>Sector: ".$tupla['sector']."</p>
                    <p>Policia: ".$tupla['nombre']."</p>
                    <p>Ubicacion: ".$tupla['ubi']."</p>
                    <p>Nomina: ".$tupla['nomina']."</p>
                    <p>Folio de consulta: ".$tupla['id_dc']."</p>
                    <p>Datos: ".$tupla['datos_consulta']."</p>    
                    <br>
                    <p>Id de chat: $id$folio</p>
                    </div>
                    ";
                }
        
                mysqli_close($conexion); 
            }
            
            echo " <div  class='div-derecho' >
            <form action='respuesta_bot.php' method = 'post'  > <!-- aqui poner el php para mandar los datos a la base de datos -->
            <h1>Informacion de respuesta: </h1>
            <label for='1'>Estatus</label>
            <select  id='status' name='status'>
                <option value='Reportado' name='status'>Reportado</option>
                <option value='Sin Novedad' name='status'>Sin novedad</option>
            </select>
            <br><br>
            <label for='2'>Marca y modelo: </label>
            <input type='text' name='marca'>
            <br><br>
            <label for='3'>Año: </label>
            <input type='text' name='año'>
            <br><br>
            <label for='4'>Color: </label>
            <input type='text' name='color'>
            <br><br>
            <label for='5'>Terminacion de serie: </label>
            <input type='text' name='ter'>
            <br><br>
            <label for='6'>Placa: </label>
            <input type='text' name='placa'>
            <br><br>
            <label for='9'>Serie del motor</label>
            <input type='text' name='serie'>
            <br><br>
            <label for='10'>Analista: </label>
            <input type='text' name='analista'> 
            <br><br>
            
          
            <br><br><br>
            <input type='submit' class='btn1' name='boton'> 
            </form>
            </div>";
            session_start();
            $_SESSION['idchaat'] = $id;
            $_SESSION['fol'] = $folio;
            $_SESSION['id_us'] = $id_us;

           

           echo " <a class='btn1' href='pagina1.php'>Regresar</a>";

?>
