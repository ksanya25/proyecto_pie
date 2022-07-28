<?php 
include("db.php");

if(isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $query = "DELETE from centros WHERE codigo = $codigo";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Error al borrar");
    }

    header("Location: centros.php");
}



?>