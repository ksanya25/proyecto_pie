<?php

include("enviarcorreo.php");
include("utils/getters.php");
include("utils/utils.php");

function getDistance($addressFrom, $addressTo, $unit = ''){
   // Google API key
   $apiKey = 'AIzaSyBvKyg02jUt1_lWq1SVHaBVZBglajzBCnI';
   
   // Change address format
   $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
   $formattedAddrTo     = str_replace(' ', '+', $addressTo);
   
   // Geocoding API request with start address
   $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
   $outputFrom = json_decode($geocodeFrom);
   if(!empty($outputFrom->error_message)){
       return $outputFrom->error_message;
   }
   
   // Geocoding API request with end address
   $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
   $outputTo = json_decode($geocodeTo);
   if(!empty($outputTo->error_message)){
       return $outputTo->error_message;
   }
   
   // Get latitude and longitude from the geodata
   $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
   $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
   $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
   $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
   
   // Calculate distance between latitude and longitude
   $theta    = $longitudeFrom - $longitudeTo;
   $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
   $dist    = acos($dist);
   $dist    = rad2deg($dist);
   $miles    = $dist * 60 * 1.1515;
   
   // Convert unit and return distance
   $unit = strtoupper($unit);
   if($unit == "K"){
       return round($miles * 1.609344, 2);
   }elseif($unit == "M"){
       return round($miles * 1609.344, 2).' meters';
   }else{
       return round($miles, 2).' miles';
   }
}

//$addressFrom = 'palleter 10, massanassa';
//$addressTo   = 'archiduque carlos 70, valencia';

// Get distance in km
//$distance = getDistance($addressFrom, $addressTo, "K");



include("db.php");
include("asignatario.php");

 if (isset($_POST['guardar'])) {
    $sistema = $_POST['sistema'];
    $modelo = $_POST['modelo'];
    $centro = $_POST['centro'];
    $prioridad = $_POST['prioridad'];


    // Vamos a verificar la dirección del centro y la de los tecnicos disponibles
    $query_direccion_centro = "SELECT direccion, poblacion FROM centros WHERE codigo=$centro";
    $result = mysqli_query($conexion, $query_direccion_centro);
    $resultado = $result->fetch_assoc();
    $direccion_centro = $resultado['direccion'];
    $poblacion_centro = $resultado['poblacion'];
    $address_centro = $direccion_centro.' '.$poblacion_centro;
    
    // Vamos a obtener los datos de los técnicos
    $query_tecnicos ="SELECT dni, direccion, poblacion, email FROM tecnicos";
    $result = mysqli_query($conexion, $query_tecnicos);
    //$resultado = $result->fetch_assoc();
    //$direccion_tecnico = $resultado['direccion'];
    //$poblacion_tecnico = $resultado['poblacion'];
    $distancia_minima=1000;
    $dni='';
    $poblacion_origen='';
    $email_tecnico='';
    while($row = mysqli_fetch_array($result)) {
      
      $address_tecnico = $row['direccion'].' '.$row['poblacion'];
      $distancia = getDistance($address_centro, $address_tecnico, 'K');
      if ($distancia  < $distancia_minima) {
       
         $distancia_minima = $distancia;
         $dni = $row['dni'];
         $poblacion_origen=$row['poblacion'];
         $email_tecnico=$row['email'];
      }
    }
    echo "la distancia mínima es: ". $distancia_minima ." y le corresponde el aviso a: ".$dni. " que vive en: ".$poblacion_origen;


    $asignacion = $dni;
    
    $estaEnGarantia = estaEnGarantia(getGarantia($modelo), getFechaActual());
    
    $query = "INSERT INTO incidencias (sistema, modelo, centro, asignacion, prioridad, garantia) VALUES ('$sistema', '$modelo', '$centro', '$dni', '$prioridad', '$estaEnGarantia')";
    $resultado = mysqli_query($conexion, $query);
    
    modificarCarga($asignacion, 'anyadir');

    $obtenerId = "SELECT incidencias.id as id, incidencias.centro as centro, incidencias.sistema as sistema, incidencias.prioridad as prioridad, centros.nombrecentro as nombrecentro FROM incidencias INNER JOIN centros WHERE incidencias.id IN (SELECT MAX(id) as id FROM incidencias) AND incidencias.centro = centros.codigo";
    $getId = mysqli_query($conexion, $obtenerId);
    $resultado = $getId->fetch_assoc();    

    $id_incidencia = $resultado['id'];
    $codigo_centro_incidencia = $resultado['centro'];
    $sistema_incidencia = $resultado['sistema'];
    $prioridad_incidencia = $resultado['prioridad'];
    $nombre_centro_incidencia = $resultado['nombrecentro'];

    // Enviamos correo al técnico asignado

    sendMail($email_tecnico, $id_incidencia, $codigo_centro_incidencia, $nombre_centro_incidencia, $prioridad_incidencia, $sistema_incidencia);
    header("Location: index.php");
    
 }
 ?>
