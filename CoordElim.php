<?php

require_once 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    #Eliminar
    $id = $_POST["id"];

    $my_query = "delete from coordinador where id = '".$id."'";
    $result = $mysql -> query($my_query);
    if($result){
        echo "Registro eliminado satisfactoriamente...";
    } else {
        echo "Error al eliminar registro...";
    }
} else {
    echo "Error en la solicitud (Verifique el tipo de Request Method que esta usando)";
}
