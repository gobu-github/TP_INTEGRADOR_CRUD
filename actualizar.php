<?php

include("clases/RepositorioAlumno.php");

require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['usu_usuario'])) {
    $usuario = unserialize($_SESSION['usu_usuario']);
    $nomApe = $usuario->getNombreApellido();
}

$modelo = new RepositorioAlumno;
$alumno = $modelo->getAlumno($_GET['alu_id']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="alu_id" value="<?=$alumno['alu_id']; ?>">
                                
                                <input type="text" class="form-control mb-3" name="dni" placeholder="Dni" value="<?=$alumno['alu_dni']; ?>">
                                <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?=$alumno['alu_nombres']; ?>">
                                <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?=$alumno['alu_apellidos']; ?>">
                                <input type="text" class="form-control mb-3" name="nota" placeholder="Nota" value="<?=$alumno['alu_nota']; ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>