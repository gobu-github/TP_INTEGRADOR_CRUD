<?php

include("clases/RepositorioAlumno.php");
require_once 'clases/Usuario.php';

session_start();
if (isset($_SESSION['usu_usuario'])) 
{
    $usuario = unserialize($_SESSION['usu_usuario']);
    $usu_id = $usuario->getId();
    $nomApe = $usuario->getNombreApellido();
} else {
    header('Location: index.php');
}


$modelo = new RepositorioAlumno;
$alta = $modelo->altaAlumno($usu_id, $_POST['dni'], $_POST['nombres'], $_POST['apellidos'], $_POST['nota']);

if($alta)
{
   Header("Location: home.php"); 
}

?>