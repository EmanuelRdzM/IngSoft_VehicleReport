<?php 
    session_start();
    $correo = $_SESSION['username'];
        
    if($correo==null || $correo==''){
        //phpinfo();
           
        echo '<script type="text/javascript">
            alert("Esta herrmienta requiere un inicio de sesion. Por favor autentifiquise");
            window.location.replace("https://mondongoproyecto.com/INGENIERIAS1/index.html");
        </script>';
        
    }
    
?>

<html lang="en">

    <head>
        
    </head>

    <body>
        
    </body>

</html>