<?php 
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT asignacion FROM incidencias WHERE id=$id";
    $result = mysqli_query($conexion, $consulta);    
    $array = $result->fetch_assoc();
    $dni = $array['asignacion'];

    $query = "DELETE from incidencias WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Error al borrar");
    }

    include("asignatario.php");
    modificarCarga($dni, 'quitar');

    /*$consulta = "SELECT carga FROM tecnicos WHERE dni='$dni'";    
    $result = mysqli_query($conexion, $consulta);
    $array = $result->fetch_assoc();
    $carga = $array['carga']-1;   
    $update_carga = "UPDATE tecnicos SET carga = $carga WHERE dni='$dni'";
    mysqli_query($conexion, $update_carga);*/

    header("Location: index.php");
}



?>