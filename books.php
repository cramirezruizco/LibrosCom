<?php require_once("templete/header.php"); ?>

<?php
require_once("admin/config/database.php");

$sentenceSQL = $connection->prepare("SELECT * FROM books");
$sentenceSQL->execute();
$listBooks=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listBooks as $book) { ?>
<div class="col-md-4 my-3">
    <div class="card h-100">
        <div class="card-header"><h5>Titulo: <?= $book['name']; ?></h5></div>
        <center>
            <img class="card-img-top p-3" src="img/books/<?= $book['image']; ?>" alt="Libro" style="width:200px; height: 200px; object-fit: cover;">
        </center>
        <div class="card-body">
            <h6 class="card-title fw-bold">Descripcion del libro</h6>
            <p class="card-text"><?= $book['description']; ?></p>
        </div>
        <div class="card-footer">
        <a href="" class="btn btn-outline-success col-12">Leer libro</a>
        </div>
    </div>
</div>
<?php } ?>


<?php require_once("templete/footer.php"); ?>
