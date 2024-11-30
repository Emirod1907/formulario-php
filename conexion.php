<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "admisiones";//nombre de la base de datos

$conexion = new mysqli($server, $user, $pass, $db);

if($conexion -> connect_errno){
    die("Conexion Fallida<br>". $conexion -> connect_errno);
}
else{
    echo "Conexion establecida correctamente<br>";
}
?>