<?php

function sendMail ($destinatario, $id, $codigocentro, $nombrecentro, $prioridad, $servicioafectado) {

    $subject = "Tienes asignada una incidencia: ". $id;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: aleyone@gmail.com" . "\r\n" . "CC: don_et1978@hotmail.com";
    $mensaje = "
    <html>
    <head>
    <title>AVISO INCIDENCIA ASIGNADA</title>
    <body>
    <h1>NUEVA INCIDENCIA</h1>
    <p>Hola, tienes asignada una nueva incidencia en el centro: ". $codigocentro ." - " .$nombrecentro. "</p>
    </br></br>
    <h4>DETALLE DE LA INCIDENCIA</h4>
    <p>Servicio afectado: ". $servicioafectado ."</p>
    <p>Prioridad: ". $prioridad ."</p>
    </body>
    </head>
    </html>    
    ";

    mail ($destinatario, $subject, $mensaje, $headers);

}

/*if (mail ("don_et1978@hotmail.com", "Asunto del correo", "Mensaje del correo", "From: aleyone@gmail.com")){
    echo "Correo enviado";
} else echo "Error al enviar correo";*/

?>