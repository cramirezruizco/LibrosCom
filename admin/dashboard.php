<?php require_once("templete/header.php"); ?>

<div class="container">
  <div class="card p-5 shandow-lg rounded">
    <div class="jumbotron">
      <h1 class="display-3">Bienvenido <?= $nameUser; ?></h1>
      <h4 class="my-3">¿Quieres comenzar agregar libros al sitio web?</h4>
      <p class="lead fs-6 p-1">
        
      </p>
      <hr class="my-2">
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="session/books.php" role="button">Administar libros</a>
      </p>
    </div>
  </div>
</div>

<?php require_once("templete/footer.php"); ?>