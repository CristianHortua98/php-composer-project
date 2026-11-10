<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


use Vendor\ProjectOne\Controllers\UsuarioController;

$controller = new UsuarioController();

$usuarios = $controller->listar();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST["crear"])){

        $datos = array(
            "nombre" => $_POST["nombre"],
            "email" => $_POST["email"],
            "edad" => $_POST["edad"],
        );

        $controller->registrar($datos);
        header('Location: usuarios.php');

    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container-fluid p-0">

        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand text-white" href="#">Usuarios</a>
        </nav>


        <div class="container">

            <div class="card mt-4 shadow-md">
                <div class="card-body">

                    <div class="row">
        
                        <div class="col-sm-12 col-md-6">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>EMAIL</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($usuarios as $key => $usuario) : ?>

                                        <tr>
                                            <td><?php echo $usuario["id"]; ?></td>
                                            <td><?php echo $usuario["nombre"]; ?></td>
                                            <td><?php echo $usuario["email"]; ?></td>
                                            <td><button class="btn btn-sm btn-danger">DEL</button></td>
                                        </tr>


                                    <?php endforeach ?>

                                </tbody>
                            </table>

                        </div>
        
                        <div class="col-sm-12 col-md-6">

                            <h4>Formulario Usuario</h4>

                            <hr>

                            <form method="post">

                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required>

                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>

                                <label for="edad">Edad</label>
                                <input type="number" class="form-control" name="edad" id="edad" min="0" max="120" required>

                                <br>

                                <button type="submit" class="btn btn-primary" name="crear">Guardar</button>

                            </form>

                        </div>
        
                    </div>
                </div>

            </div>

        </div>


    </div>


    
</body>
</html>