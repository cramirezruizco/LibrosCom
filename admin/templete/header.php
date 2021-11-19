<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:index.php");
}else{
    if($_SESSION['user']=="ok"){
        $nameUser = $_SESSION['nameUser'];
    }
}

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Administracion | Libros Com</title>

  </head>
  <body style="background-color: #f1f1f1;">
      
<div class="container-fluid">

    <!-- Enrutador local provisional -->
    <?php $url="http://".$_SERVER['HTTP_HOST']."/libroscom" ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 border-bottom shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $url ?>/admin/dashboard.php">Administracion Libros Com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $url ?>/admin/dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $url ?>/admin/session/books.php">Gestor de libros</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a href="<?= $url ?>" class="btn btn-primary me-2">Ver sitio web</a>
                <a href="<?= $url ?>/admin/index.php" class="btn btn-danger me-2">Cerrar sesion</a>              
            </ul>
            </div>
        </div>
    </nav>
</div>

<main class="container my-5">
  <div class="row">