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
$alumnos = $modelo->getAlumnos($usu_id);

?>

<!DOCTYPE html>

<html>
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Qvalify home</title>
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    </head>
    
    <body>
        <div class="container mt-5">
            
            <div class="row"> 
                
                <div class="col-md-3">
                    
                    <!--Panel lateral para ingresar datos de alumnos-->
                    <table class="table">
                        
                        <thead class="table-success table-striped" >
                        <tr>
                            <th><h4>Alumnos</h4></th>
                        </tr>
                        
                    </table>
                    
                    <h3>Ingrese datos</h3>
                    
                    <form action="insertar.php" method="POST">

                        <input type="text" class="form-control mb-3" name="dni" placeholder="Dni">
                        <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                        <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                        <input type="text" class="form-control mb-3" name="nota" placeholder="Nota">
                        
                        <input type="submit" class="btn btn-primary">
                    
                    </form>

                    <!-- Boton para funcionalidad AJAX con datos del Profesor logueado-->
                    <br>
                    <button  class="btn btn-primary" onclick = "ejecutarAJAX()">Datos Sesión Profesor</button>
                    <br>
                    <br>

                    <table class="table">
                        <thead class="table-success table-striped" >
                        
                        <tr>
                            <th><p>Nota promedio: <?= round($alumnos[1])?></p></th>
                        </tr>
                    </table>

                </div>

                <!--Panel donde se refejan los datos ingresados de los alumnos-->
                <div class="col-md-8">
                    
                    <table class="table" >
                        
                        <thead class="table-striped" >
                            <tr>
                                <th>Código</th>
                                <th>Dni</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Nota</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>

                        
                        <!--Datos de los alumnos + botones editar y eliminar + colores si nota < 6-->
                        <tbody>
                            
                            <?php foreach($alumnos[0] as $i => $v):?>
                                
                                <?php $clase = $v['5'] < 6 ? 'table-danger' : 'table-success'; ?>
                                
                                <tr id="fila-<?=$v['0']?>" class='<?=$clase?>'>
                                    <th><?=$v['0'];?></th>
                                    <th><?=$v['2'];?></th>
                                    <th><?=$v['3'];?></th>
                                    <th><?=$v['4'];?></th>
                                    <th><?=$v['5'];?></th>
                                    <th><a href="actualizar.php?alu_id=<?=$v['0'];?>" class="btn btn-sm btn-info">Editar</a></th>
                                    <th><a href="delete.php?alu_id=<?=$v['0']; ?>" class="btn btn-sm btn-danger">Eliminar</a></th>                                        
                                </tr>

                            <?php endforeach; ?>
                        
                        </tbody>
                    
                    </table>
                    
                    
                    <!--Inicio función ejecutar AJAX que llama al contenido en datosProfAjax.php-->

                    <div id = "info"> </div>

                    <script type="text/javascript">
                        function ejecutarAJAX()
                        {
                            var ajaxRequest = new XMLHttpRequest();
                            ajaxRequest.onreadystatechange = function()
                            
                            {
                                if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
                                    document.getElementById("info").innerHTML = ajaxRequest.responseText;
                                }
                            }
                            ajaxRequest.open("GET", "datosProfAjax.php", true);
                            ajaxRequest.send();
                        }
                        
                    </script>

                </div>
            
            </div>  
        
        </div>
        
        <div class="text-center">
                <p><a href="logout.php">Cerrar sesión</a></p>
        </div> 

    </body>
    
</html>

