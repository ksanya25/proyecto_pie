<?php

function getGarantia($modelo){
    include("./db.php");
    $query = "SELECT fin_garantia FROM garantias WHERE modelo='$modelo'";
    $llamada = mysqli_query($conexion, $query);
    $resultado = $llamada->fetch_assoc(); 
    $garantia = $resultado['fin_garantia'];
    return $garantia;
}

?>