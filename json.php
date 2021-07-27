<?php
$cedula = $_REQUEST['CEDULA'];

$cnx = new PDO("mysql:host=localhost;dbname=controlactivos","root","");

$res = $cnx->query("SELECT * FROM USUARIOS WHERE CEDULA='$cedula'");
$datos= array();

foreach($res as $row){
    $datos[] = $row;
}

echo json_encode($datos);

?>
