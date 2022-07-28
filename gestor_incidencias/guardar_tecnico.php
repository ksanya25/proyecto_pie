<?php

include("db.php");

 if (isset($_POST['guardar_tecnico'])) {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $poblacion = $_POST['poblacion'];
    $carga = $_POST['carga'];
    $email = $_POST['email'];

    $query = "INSERT INTO tecnicos (dni, nombre,direccion, poblacion, carga, email) VALUES ('$dni', '$nombre','$direccion', '$poblacion', '$carga', '$email')";
    $resultado = mysqli_query($conexion, $query);

    header("Location: tecnicos.php");
    
 }
 ?>
