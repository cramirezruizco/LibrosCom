<?php

$host="localhost";
$database="libroscom";
$user="root";
$password="";

try {
    $connection=new PDO("mysql:host=$host;dbname=$database",$user,$password);
if($connection){/*echo "conectando.... a sistema";*/}
} catch(PDOException $ex) {

    echo $ex->getMessage();
}

?>