<?php 

require_once 'clases/RepositorioUsuario.php';
require_once 'clases/Usuario.php';
require_once 'clases/RepositorioAlumno.php';

session_start();
    $usuario = unserialize($_SESSION['usu_usuario']);
    $usu_id = $usuario->getId();
    $usu_nombre = $usuario->getNombre();
    $usu_apellido = $usuario->getApellido();

?>

<div class="d-flex justify-content-center">
    <div class="col-md-8 text-center mt-5">

        <table class="table tabe-bordered">
            <thead>
                <tr>
                    <th>ID Profesor</th>
                    <th>Nombre Profesor</th>
                    <th>Apellido Profesor</th>
                </tr>
            </thead>

            <thead>
                <tr>
                    <td><?php echo $usu_id?></td>
                    <td><?php echo $usu_nombre?></td>
                    <td><?php echo $usu_apellido?></td>
                </tr>
            </thead>

        </table>
        
    </div>

</div>