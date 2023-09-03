<?php
    session_start();
    $mensaje="accediendo";
    $servername="localhost";
    $username="mondongo_1718";
    $password="820455641080";
    $dbname="mondongo_1952023";
    
    $correo=$_POST['user'];
    $clave=$_POST['password'];
    
    //$conn=mysqli_connect($servername, $username, $password, $dbnmae);
    $conn = new mysqli($servername, $username, $password, $dbname);
    $q = "SELECT COUNT(*) as contar FROM usuarios WHERE `usuario(telegram)` = '$correo' and `pass`='$clave' ; ";
    if($conn){
        echo 'alert("Si jalo")';
    }else{
        echo 'alert("No jalo")';
    }
    $query=mysqli_query($conn,$q);
    $array=mysqli_fetch_array($query);
    
    if($array['contar']>0){
        $_SESSION['username']=$correo;
        echo '<script type="text/javascript">
        alert("Datos correctos");
        window.location.replace("https://mondongoproyecto.com/INGENIERIAS1/pagina2.php");
    </script>';
        
    }else{
        echo '<script type="text/javascript">
        alert("Datos incorrectos");
        window.location.replace("https://mondongoproyecto.com/INGENIERIAS1/index.html");
    </script>';
    }
    
?>