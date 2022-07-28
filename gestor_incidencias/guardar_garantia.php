<?php

include("db.php");

 if (isset($_POST['guardar_garantia'])) {
    $modelo = $_POST['modelo'];
    $descripcion = $_POST['descripcion'];
    $fin_garantia = $_POST['fin_garantia'];

    $query = "INSERT INTO garantias (modelo, descripcion, fin_garantia) VALUES ('$modelo', '$descripcion', '$fin_garantia')";
    $resultado = mysqli_query($conexion, $query);

    header("Location: garantias.php");
    
 }
 ?>
