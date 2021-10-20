<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Qvalify login</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div class="container jumbotron text-center d-flex flex-column mt-5">
            <div class="col-12">
                <h1>Qvalify</h1>
                <h5>Sistema de Calificación para Profesores</h5>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-4 text-center mt-5">
                    <div class="card shadow">
                        <div class="card-header">
                            <p class="h3">Login de usuario</p>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['mensaje'])) {
                                echo '<div id="mensaje" class="alert alert-primary text-center">
                                    <p>'.$_GET['mensaje'].'</p></div>';
                                }
                            ?>

                            <form action="login.php" method="post">
                                <input name="usuario" class="form-control form-control" placeholder="Usuario"><br>
                                <input name="clave" type="text" class="form-control form-control" placeholder="Contraseña"><br>
                                <input type="submit" value="Ingresar" class="btn btn-primary">
                            </form><br>
                            <p><a href="create.php">Crear nuevo usuario</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
