<?php

include("db.php");

 if (isset($_POST['guardar_centro'])) {
    $codigo = $_POST['codigo'];
    $nombrecentro = $_POST['nombrecentro'];
    $direccion = $_POST['direccion'];
    $poblacion = $_POST['poblacion'];
    $nombreresponsable = $_POST['nombreresponsable'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];


    $query = "INSERT INTO centros (codigo, nombrecentro, direccion, poblacion, nombreresponsable, telefono, email) VALUES ('$codigo', '$nombrecentro', '$direccion','$poblacion', '$nombreresponsable', '$telefono', '$email')";
    $resultado = mysqli_query($conexion, $query);

    header("Location: centros.php");
    
 }
 ?>
