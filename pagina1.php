<?php 
    session_start();
    $usuario = $_SESSION['username'];
    
    if(!isset($usuario)){
        header("location: index.php");
    }
?>


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SSP</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-11 offset-lg-1">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="INGENIERIAS1/index.php">
                <img src="images/logo1.png" alt="">
                <span>
                  UPSLP
                </span>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                  <ul class="navbar-nav  ">
                    <li class="nav-item ">
                      <a class="nav-link" href="/index.php">CERRAR SESIÓN <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="--"> Sobre nosotros</a>
                    </li>
                    
                  </ul>
                  <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                  </form>
                </div>

              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-5 offset-md-1 ">
                  <div class="detail_box">
                    <h1>
                      Seguridad Cibernética <br>
                      SSPC
                    </h1>
                    <p>
                      Nuestra misión es prevenir y auxiliar a las y los ciudadanos de cualquier situación que ponga en riesgo su integridad física y patrimonial, en la red pública de internet.
Debido al incremento del uso de internet y los dispositivos móviles, 
Con nuestras acciones, día con día promovemos el Civismo Digital en la Ciudad, es decir, transmitimos conocimientos de prevención, respeto y autociudado al navegar de forma segura en la web.
                    </p>
                    
                  </div>
                </div>
                <div class="col-md-6 px-0">
                  <div class="img-box">
                    <img src="images/slider-img2.jpg" alt="" >
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        
    <!-- end slider section -->
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container">
        
      </div>
      <div class="box">
        <div class="img-box">
          <img src="images/ok1.png" alt="">
          <div class="about_img-bg">
            <img src="images/logo1.png" alt="">
          </div>
        </div>
      
      </div>
    </div>

  </section>

  <section class="about_section layout_padding">
    <div class="container">
      <div class="heading_container">
          <br><br><br><br>
        <style>
          table {
              border-collapse: separate;
          }
          tr{
            border: 5px solid black ;
          }
          tr{
            border: black  5px solid;
          }
          tbody {
              border: blue 5px solid;
          }
        </style>
        <?php 
        $cuanto=0;
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS motivo FROM datos_c WHERE motivo='vehiculo abandonado' AND estatus = 'pendiente';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto = $tupla['motivo']; 
                }
                mysqli_close($conexion); 
            }
            $array = array(); 
        
            $primero = 0;
            $segundo = 1;
            $tercero = 2;
        
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT"." *"." FROM datos_c JOIN bot_users ON datos_c.id_us = bot_users.id WHERE motivo='vehiculo abandonado' AND estatus = 'pendiente';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                array_push($array,$tupla['id_dc']); 
                array_push($array, $tupla['nombre']);
                array_push($array,$tupla['estatus']);
                }
        
                mysqli_close($conexion); 
            }
        
        
        echo "
        <div tabindex='-1' id='tablas'>
        <h2>
          Solicitudes
        </h2>
        </div>
        
        <table WIDTH='80%' HEIGHT='20%' style='text-align: center'>
        <thead class='table-dark'>
            <tr >
            <th style='background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>Vehículo abandonado</th>
            </tr>
            </thead>
            <tbody>";
                $suma=0;
            for($i=0;$i<$cuanto;$i++){
                echo "<tr style='border: white'>";
                        echo "<td style='background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>".$array[$primero]."--".$array[$segundo].":-- ".$array[$tercero]."
                        <br>
                        <form action='verdatos.php' method='POST'>
                        <button name='boton".$array[$primero]."' value='opcion".$array[$primero]."' type='submit'>Revisar</button>
                        </form>
                        </td>";
                        $suma++;
                echo "</tr>";
                $primero = $primero+3;
                $segundo = $segundo+3;
                $tercero = $tercero+3;
            }
        echo "</tbody>
        </table>";
        
        
        
        /*segunda tabla*/ 
        $cuanto1=0;
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS id_dc FROM datos_c WHERE motivo ='vehiculo reportado' AND estatus = 'pendiente';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto1 = $tupla['id_dc']; 
                }
                mysqli_close($conexion); 
            }
            $array1 = array(); 
        
            $primero1 = 0;
            $segundo1 = 1;
            $tercero1 = 2;
        
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT"." *"." FROM datos_c JOIN bot_users ON datos_c.id_us= bot_users.id WHERE motivo='vehiculo reportado' AND estatus = 'pendiente';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                array_push($array1,$tupla['id_dc']); 
                array_push($array1, $tupla['nombre']);
                array_push($array1,$tupla['estatus']);
                }
        
                mysqli_close($conexion); 
            }
        
        
        echo "<table WIDTH='80%' HEIGHT='20%' style='text-align: center'>
        <thead class='table-dark'>
            <tr >
            <th style='background: rgba(0, 211, 255, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>Vehículo Reportados</th>
            </tr>
            </thead>
            <tbody>";
                $suma1=0;
            for($i=0;$i<$cuanto1;$i++){
                echo "<tr style='border: white'>";
                        echo "<td style='background: rgba(0, 211, 255, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>".$array1[$primero1]."--".$array1[$segundo1].":-- ".$array1[$tercero1]."
                        <br>
                        <form action='verdatos.php' method='POST'>
                        <button name='boton".$array1[$primero1]."' value='opcion".$array1[$primero1]."' type='submit'>Revisar</button>
                        </form>
                        </td>";
                        $suma1++;
                echo "</tr>";
                $primero1 = $primero1+3;
                $segundo1 = $segundo1+3;
                $tercero1 = $tercero1+3;
            }
        echo "</tbody>
        </table>";
        
        
        /*tercera tabla*/
        
        $cuanto2=0;
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS id_dc FROM datos_c WHERE motivo ='inspeccion' AND estatus = 'pendiente';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto2 = $tupla['id_dc']; 
                }
                mysqli_close($conexion); 
            }
            $array2 = array(); 
        
            $primero2 = 0;
            $segundo2 = 1;
            $tercero2 = 2;
        
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT"." *"." FROM datos_c JOIN bot_users ON datos_c.id_us= bot_users.id WHERE motivo='inspeccion' AND estatus = 'pendiente' AND estatus = 'pendiente';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                array_push($array2,$tupla['id_dc']); 
                array_push($array2, $tupla['nombre']);
                array_push($array2,$tupla['estatus']);
                }
        
                mysqli_close($conexion); 
            }
        
        
        echo "<table WIDTH='80%' HEIGHT='20%' style='text-align: center'>
        <thead class='table-dark'>
            <tr >
            <th style='background: rgba(255, 99, 71, 0.6); border: 1px solid rgba(100, 200, 0, 0.3);0'>Inspeccion</th>
            </tr>
            </thead>
            <tbody>";
                $suma2=0;
            for($i=0;$i<$cuanto2;$i++){
                echo "<tr style='border: white'>";
                        echo "<td style='background: rgba(255, 99, 71, 0.6); border: 1px solid rgba(100, 200, 0, 0.3);'>".$array2[$primero2]."--".$array2[$segundo2].":-- ".$array2[$tercero2]."
                        <br>
                        <form action='verdatos.php' method='POST'>
                        <button name='boton".$array2[$primero2]."' value='opcion".$array2[$primero2]."' type='submit'>Revisar</button>
                        </form>
                        </td>";
                        $suma2++;
                echo "</tr>";
                $primero2 = $primero2+3;
                $segundo2 = $segundo2+3;
                $tercero2 = $tercero2+3;
            }
        echo "</tbody>
        </table>";


// ----------------------------------------------------------- SOLICITUDES PROCESADAS -----------------------------------------------------------------------

        $cuanto=0;
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS motivo FROM datos_c WHERE motivo='vehiculo abandonado' AND estatus = 'procesada';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto = $tupla['motivo']; 
                }
                mysqli_close($conexion); 
            }
            $array = array(); 
        
            $primero = 0;
            $segundo = 1;
            $tercero = 2;
        
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT"." *"." FROM datos_c JOIN bot_users ON datos_c.id_us = bot_users.id WHERE motivo='vehiculo abandonado' AND estatus = 'procesada';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                array_push($array,$tupla['id_dc']); 
                array_push($array, $tupla['nombre']);
                array_push($array,$tupla['estatus']);
                }
        
                mysqli_close($conexion); 
            }
        
        
        echo "
        <div tabindex='-1' id='tablas'>
        <h2>
        <br><br><br>
          Solicitudes procesadas
        </h2>
        </div>
        
        <table WIDTH='80%' HEIGHT='20%' style='text-align: center'>
        <thead class='table-dark'>
            <tr >
            <th style='background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>Vehículo abandonado</th>
            </tr>
            </thead>
            <tbody>";
                $suma=0;
            for($i=0;$i<$cuanto;$i++){
                echo "<tr style='border: white'>";
                        echo "<td style='background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>".$array[$primero]."--".$array[$segundo].":-- ".$array[$tercero]."
                        <br>
                        <form action='pdfs.php' method='POST'>
                        <button name='boton".$array[$primero]."' value='opcion".$array[$primero]."' type='submit'>Generar informe</button>
                        </form>
                        </td>";
                        $suma++;
                echo "</tr>";
                $primero = $primero+3;
                $segundo = $segundo+3;
                $tercero = $tercero+3;
            }
        echo "</tbody>
        </table>";
        
        
        
        /*segunda tabla*/ 
        $cuanto1=0;
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS id_dc FROM datos_c WHERE motivo ='vehiculo reportado' AND estatus = 'procesada';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto1 = $tupla['id_dc']; 
                }
                mysqli_close($conexion); 
            }
            $array1 = array(); 
        
            $primero1 = 0;
            $segundo1 = 1;
            $tercero1 = 2;
         
        
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT"." *"." FROM datos_c JOIN bot_users ON datos_c.id_us= bot_users.id WHERE motivo='vehiculo reportado' AND estatus = 'procesada';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                array_push($array1,$tupla['id_dc']); 
                array_push($array1, $tupla['nombre']);
                array_push($array1,$tupla['estatus']);
                
                }
        
                mysqli_close($conexion); 
            }
        
        
        echo "<table WIDTH='80%' HEIGHT='20%' style='text-align: center'>
        <thead class='table-dark'>
            <tr >
            <th style='background: rgba(0, 211, 255, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>Vehículo Reportados</th>
            </tr>
            </thead>
            <tbody>";
                $suma1=0;
            for($i=0;$i<$cuanto1;$i++){
                echo "<tr style='border: white'>";
                        echo "<td style='background: rgba(0, 211, 255, 0.3); border: 1px solid rgba(100, 200, 0, 0.3);'>".$array1[$primero1]."--".$array1[$segundo1].":-- ".$array1[$tercero1]."
                        <br>
                        <form action='pdfs.php' method='POST'>
                        <button name='boton".$array1[$primero1]."' value='opcion".$array1[$primero1]."' type='submit'>Generar informe</button>
                        </form>
                        </td>";
                        $suma1++;
                echo "</tr>";
                $primero1 = $primero1+3;
                $segundo1 = $segundo1+3;
                $tercero1 = $tercero1+3;
               
            }
        echo "</tbody>
        </table>";
        
        
        /*tercera tabla*/
        
        $cuanto2=0;
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS id_dc FROM datos_c WHERE motivo ='inspeccion' AND estatus = 'procesada';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto2 = $tupla['id_dc']; 
                }
                mysqli_close($conexion); 
            }
            $array2 = array(); 
        
            $primero2 = 0;
            $segundo2 = 1;
            $tercero2 = 2;
        
        $conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion"); 
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas2") or die("Problemas en base de datos"); 
                $query = "SELECT"." *"." FROM datos_c JOIN bot_users ON datos_c.id_us= bot_users.id WHERE motivo='inspeccion' AND estatus = 'procesada';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                array_push($array2,$tupla['id_dc']); 
                array_push($array2, $tupla['nombre']);
                array_push($array2,$tupla['estatus']);
                }
        
                mysqli_close($conexion); 
            }
        
        
        echo "<table WIDTH='80%' HEIGHT='20%' style='text-align: center'>
        <thead class='table-dark'>
            <tr >
            <th style='background: rgba(255, 99, 71, 0.6); border: 1px solid rgba(100, 200, 0, 0.3);0'>Inspeccion</th>
            </tr>
            </thead>
            <tbody>";
                $suma2=0;
            for($i=0;$i<$cuanto2;$i++){
                echo "<tr style='border: white'>";
                        echo "<td style='background: rgba(255, 99, 71, 0.6); border: 1px solid rgba(100, 200, 0, 0.3);'>".$array2[$primero2]."--".$array2[$segundo2].":-- ".$array2[$tercero2]."
                        <br>
                        <form action='pdfs.php' method='POST'>
                        <button name='boton".$array2[$primero2]."' value='opcion".$array2[$primero2]."' type='submit'>Generar informe</button>
                        </form>
                        </td>";
                        $suma2++;
                echo "</tr>";
                $primero2 = $primero2+3;
                $segundo2 = $segundo2+3;
                $tercero2 = $tercero2+3;
            }
        echo "</tbody>
        </table>";
?>
      </div>
    </div>
  </section>

  <!-- about section -->

  

  <section class="contact_section layout_padding">
    
    <div class="container">
      <div class="heading_container">
        <h2>
          Contáctanos
        </h2>
      </div>
      <div class="">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email">
                  </div>
                  <div class="">
                    <input type="text" placeholder="Message" class="message_input">
                  </div>
                  <div class=" d-flex justify-content-center ">
                    <button type="submit" onclik="inst_dt_r.php">
                      Envía
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end contact section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h4 class="">
              Síguenos:)
            </h4>
          </div>
          <div class="social_box">
            <a href="https://www.facebook.com/upslp/">
              <img src="images/fb.png" alt="">
            </a>
            <a href="https://twitter.com/UPSLP_MX/status/1661497803762450433">
              <img src="images/twitter.png" alt="">
            </a>
            <a href="https://www.instagram.com/upslp_oficial/">
              <img src="images/instagram.png" alt="">
            </a>
            <a href="https://es.linkedin.com/school/universidad-polit%C3%A9cnica-de-san-luis-potos%C3%AD/">
              <img src="images/linkedin.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  
  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>


</html>