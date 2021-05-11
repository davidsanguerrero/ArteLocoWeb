<?php

$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "db_papeleria";


$conexion = new mysqli($host, $usuario, $clave,$bd);
if($conexion){
}
else{
    echo "no se pudo conectar";
}
?>
    