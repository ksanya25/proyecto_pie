<?php
$isLogged = false;

function estaEnGarantia ($fecha_garantia, $fecha_incidencia) {
    $garantia = "Si";
    echo "Esta es la fecha de la garantía".$fecha_garantia;
    echo "Esta es la fecha de hoy".$fecha_incidencia;

    if ($fecha_garantia < $fecha_incidencia) $garantia="No";

    echo "Aqui va la garantia".$garantia;

    return $garantia;
}

function getFechaActual () {
    return date('Y-m-d');
   
}

function getLogged(){
    global $isLogged;
    return $isLogged;
}

function setLogged(){
    global $isLogged;
    $isLogged = !$isLogged;
}

?>