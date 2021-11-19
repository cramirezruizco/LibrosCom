<?php
session_start();
if($_POST){
    if(($_POST['user']=="admin")&&($_POST['password']=="admin")){

        $_SESSION['user']="ok";
        $_SESSION['nameUser']="admin";

        header('Location:dashboard.php');
    }else{
        $message="<b>Error:</b> El usuario o contraseña son incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Admninistracion | Libros Com</title>

</head>
<body style="background-color: #f1f1f1;">

<main class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 my-5">
                <div class="card shandow-lg rounded">
                    <div class="card-header">
                        Iniciar sesion
                    </div>
                    <div class="card-body">
                        <form method="POST">
                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="text" class="form-control my-1" name="user" placeholder="Ingresar su usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control my-1" name="password" placeholder="Ingresar su contraseña">
                        </div>

                        <?php if(isset($message)) {?>
                            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                                <?= $message ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <div class="text-left">
                            <button type="submit" class="btn btn-primary my-2 col-12">Iniciar sesion</button>
                            <a href="../index.php" class="btn btn-outline-danger col-12">Volver</a>
                        </div>
                        </form>      
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
</body>
</html>