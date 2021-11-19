<?php require_once("templete/header.php"); ?>

<div class="container">
  <div class="card p-5 shandow-lg rounded">
    <div class="jumbotron">
      <h1 class="display-4">Los mejores libros a un solo clic</h1>
      <h4 class="my-3">¿Que es un libro?</h4>
      <p class="lead fs-6 p-1">
        Un libro es el conjunto de hojas de papel, vitela, u otra sustancia, manuscritas o impresas, colocadas en el orden en que se han de leer...
      </p>
      <hr class="my-2">
      <p><a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#exampleModal">Leer Mas</a></p>
      <p class="lead">
        <a class="btn btn-outline-primary btn-lg" href="books.php" role="button">Almacen de libros</a>
      </p>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Que es un libro?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Libro</h3>
          <p>
            Un libro es el conjunto de hojas de papel, vitela, u otra sustancia, manuscritas o impresas, colocadas en el orden en que se han de leer, y que reunidas o encuadernadas forman un volumen. Pueden contener textos, imágenes, dibujos o música. El término se denomina también a ciertos conjuntos de obras, por ejemplo, los distintos libros de la Biblia, etc. Una obra debe tener un cierto número de páginas para ser considerado como tal, por lo menos 50 páginas, y ha de constituir una unidad independiente para distinguirse de los periódicos, revistas, folletos y otros materiales impresos.
          </p>
      <div class="text-center">
        <img src="img/LibrosModal.png" alt="LibrosModal" width="100">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once("templete/footer.php"); ?>