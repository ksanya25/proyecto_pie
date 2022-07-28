<?php 
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE from garantias WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Error al borrar");
    }

    header("Location: garantias.php");
}



?>