<?php require_once("../templete/header.php"); ?>
<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtName=(isset($_POST['txtName']))?$_POST['txtName']:"";
$txtDescription=(isset($_POST['txtDescription']))?$_POST['txtDescription']:"";
$txtImage=(isset($_FILES['txtImage']['name']))?$_FILES['txtImage']['name']:"";
$action=(isset($_POST['action']))?$_POST['action']:"";

require_once("../config/database.php");


switch($action){
    case "Agregar":

        $sentenceSQL = $connection->prepare("INSERT INTO books (name,description,image) VALUES (:name,:description,:image);");
        $sentenceSQL->bindParam(':name',$txtName);

        $fecha = new DateTime();
        $nombreArchivo=($txtImage!="")?$fecha->getTimestamp()."_".$_FILES["txtImage"]["name"]:"imagen.jpg";

        $tmpImage=$_FILES["txtImage"]["tmp_name"];

        if($tmpImage!=""){
            move_uploaded_file($tmpImage,"../../img/books/".$nombreArchivo);
        }

        $sentenceSQL->bindParam(':description',$txtDescription);
        $sentenceSQL->bindParam(':image',$nombreArchivo);
        $sentenceSQL->execute();

        header("Location:books.php");
        //echo "Presionando el boton agregar";
        break;

    case "Modificar":

        $sentenceSQL = $connection->prepare("UPDATE books SET name=:name WHERE id=:id");
        $sentenceSQL->bindParam(':name',$txtName);
        $sentenceSQL->bindParam(':id',$txtID);
        $sentenceSQL->execute();

        $sentenceSQL = $connection->prepare("UPDATE books SET description=:description WHERE id=:id");
        $sentenceSQL->bindParam(':description',$txtDescription);
        $sentenceSQL->bindParam(':id',$txtID);
        $sentenceSQL->execute();

        if($txtImage!=""){
   
            $fecha = new DateTime();
            $nombreArchivo=($txtImage!="")?$fecha->getTimestamp()."_".$_FILES["txtImage"]["name"]:"imagen.jpg";
            $tmpImage=$_FILES["txtImage"]["tmp_name"];

            move_uploaded_file($tmpImage,"../../img/".$nombreArchivo);

            $sentenceSQL = $connection->prepare("SELECT image FROM books WHERE id=:id");
            $sentenceSQL->bindParam(':id',$txtID);
            $sentenceSQL->execute();
            $book=$sentenceSQL->fetch(PDO::FETCH_LAZY);
    
            if(isset($book["image"]) && ($book["image"]!="image.jpg") ){
                if(file_exists("../../img/books/".$book["image"]));
                    unlink("../../img/books/".$book["image"]);
            }

            $sentenceSQL = $connection->prepare("UPDATE books SET image=:image WHERE id=:id");
            $sentenceSQL->bindParam(':image',$nombreArchivo);
            $sentenceSQL->bindParam(':id',$txtID);
            $sentenceSQL->execute();
        }

        header("Location:books.php");
        //echo "Presionando el boton modificar";
        break;

    case "Cancelar":

        header("Location:books.php");

        //echo "Presionando el boton cancelar";
        break;

    case "Seleccionar":

        $sentenceSQL = $connection->prepare("SELECT * FROM books WHERE id=:id");
        $sentenceSQL->bindParam(':id',$txtID);
        $sentenceSQL->execute();
        $book=$sentenceSQL->fetch(PDO::FETCH_LAZY);

        $txtName=$book['name'];
        $txtDescription=$book['description'];
        $txtImage=$book['image'];

        //echo "Presionando el boton seleccionar";
        break;

    case "Eliminar":

        $sentenceSQL = $connection->prepare("SELECT image FROM books WHERE id=:id");
        $sentenceSQL->bindParam(':id',$txtID);
        $sentenceSQL->execute();
        $book=$sentenceSQL->fetch(PDO::FETCH_LAZY);

        if(isset($book["image"]) && ($book["image"]!="image.jpg") ){
            if(file_exists("../../img/books/".$book["image"]));
                unlink("../../img/books/".$book["image"]);
        }

        $sentenceSQL = $connection->prepare("DELETE FROM books WHERE id=:id");
        $sentenceSQL->bindParam(':id',$txtID);
        $sentenceSQL->execute();

        header("Location:books.php");
        //echo "Presionando el boton eliminar";
        break;

}

$sentenceSQL = $connection->prepare("SELECT * FROM books");
$sentenceSQL->execute();
$listBooks=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">
    <div class="card shadow-lg rounded">
        <div class="card-header">Nuevo libro</div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txtID my-1">ID</label>
                <input type="text" class="form-control my-1" value="<?= $txtID ?>" name="txtID" id="txtID" placeholder="ID" readonly required>
            </div>
            <div class="form-group">
                <label for="txtName my-1">Nombre</label>
                <input type="text" class="form-control my-1" value="<?= $txtName ?>" name="txtName" id="txtName" placeholder=" Ingresar nombre del libro" required>
            </div>
            <div class="form-group">
                <label for="txtDescription my-1">Descripcion</label>
                <textarea type="text" class="form-control my-1" name="txtDescription" id="txtDescription" placeholder="Ingresar descripcion del libro" required><?=$txtDescription?></textarea>
            </div>
            <div class="form-group">
                <label for="txtImage my-1">Imagen</label>
                <br/>

                <?php if($txtImage!=""){ ?>
                    <img class="img-thumbnall rounded my-1" src="../../img/books/<?= $txtImage; ?>" width="100">
                <?php } ?>

                <input type="file" class="form-control my-1" name="txtImage" id="txtImage">
            </div>

            <div class="btn-group my-2" role="group">
                <button type="submit" name="action" <?= ($action=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success me-1">Agregar</button>
                <button type="submit" name="action" <?= ($action!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning me-1">Modificar</button>
                <button type="submit" name="action" <?= ($action!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info me-1">Cancelar</button>
            </div>
            </form>

        </div>
    </div>
</div>
<div class="col-md-7">
    <div class="card shadow-lg rounded">
        <div class="card-header">Tabla de libros (mostrar los datos de los libros)</div>
        <div class="card-body">
            <table class="table table-hover" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listBooks as $book) { ?>
                    <tr>
                        <td><?= $book['id']; ?></td>
                        <td><?= $book['name']; ?></td>
                        <td>
                            <center>
                                <img class="img-thumbnall rounded" src="../../img/books/<?= $book['image']; ?>" width="40" alt="Libro">
                            </center>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <form method="POST">
                                    <input type="hidden" name="txtID" id="txtID" value="<?= $book['id']; ?>">
                                    <input type="submit" name="action" id="action" value="Seleccionar" class="btn btn-outline-secondary btn-sm border-dark text-dark me-1">
                                    <input type="submit" name="action" value="Eliminar" class="btn btn-danger btn-sm me-1">
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once("../templete/footer.php"); ?>