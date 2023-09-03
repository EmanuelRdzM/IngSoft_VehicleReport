<?php

    require 'conexion.php';
    session_start();
    
    $usuario = $_POST['user'];
    $clave = $_POST['password'];
    
    $q = "SELECT COUNT("."*".") as id FROM analistas WHERE correo = '$usuario' and contrasena = '$clave' ; ";
    $consulta = mysqli_query($conexion,$q);
    $array = mysqli_fetch_array($consulta);
    if($array['id']>0){
        $_SESSION['username'] = $usuario;
        header("location: ./pagina1.php");
    }else{
        header("location: index.php");
    }


    /*$conexion = mysqli_connect("localhost","root","") or die("Problemas en la conexion");
            if($conexion) 
            {   mysqli_select_db($conexion,"plataforma_consultas") or die("Problemas en base de datos"); 
                $query = "SELECT COUNT("."*".") AS motivo FROM datos_c WHERE motivo='vehiculo abandonado';";
                $registros = mysqli_query($conexion,$query) or die("Problemas en la query ");
                while ($tupla = mysqli_fetch_array($registros))
                {
                $cuanto = $tupla['motivo']; 
                }
                mysqli_close($conexion); 
            }*/
?>