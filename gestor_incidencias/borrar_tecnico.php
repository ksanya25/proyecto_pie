<?php 
include("db.php");

if(isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $query = "DELETE from tecnicos WHERE dni = '$dni'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Error al borrar");
    }

    header("Location: tecnicos.php");
}



?>