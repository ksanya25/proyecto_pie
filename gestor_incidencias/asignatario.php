<?php

function getCarga ($dni) {
    include("db.php");
    $query = "SELECT carga FROM tecnicos WHERE dni='$dni'";
    $resultado = mysqli_query($conexion, $query);  
    $result = $resultado->fetch_assoc();      
    $carga = $result['carga']; 
    return $carga;
}
// Función para incrementar la carga del técnico

function modificarCarga ($dni, $tipo) {
    $carga = getCarga($dni);

    if ($tipo == 'anyadir') {
        $carga++;
    } else if ($tipo == 'quitar') {
        $carga--;
    }

    updateCarga($dni, $carga);
}

function updateCarga ($dni, $carga) {
    include("db.php");      
    $update_carga = "UPDATE tecnicos SET carga = $carga WHERE dni = '$dni'";
    mysqli_query($conexion, $update_carga);
}
                                                     
?>