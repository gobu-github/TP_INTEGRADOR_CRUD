<?php

include("clases/RepositorioAlumno.php");

require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['usu_usuario'])) {
    $usuario = unserialize($_SESSION['usu_usuario']);
    $nomApe = $usuario->getNombreApellido();
}

$modelo = new RepositorioAlumno;
$alumnos = $modelo->eliminarAlumno($_GET['alu_id']);

//echo $alumnos ? "OK" : "error";


if($alumnos){
    Header("Location: home.php");
}

?>
