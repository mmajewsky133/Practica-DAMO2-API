<?php

require_once 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    #Leer

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "select * from coordinador where id = '".$id."'";

        $result = $mysql->query($query);

        if ($mysql->affected_rows > 0) {
            $json = "{\"coordinadores\":[";
            while ($row = $result->fetch_assoc()) {
                $json = $json.json_encode($row);
                $json = $json.",";
            }
            $json = substr(trim($json), 0, -1);
            $json = $json."]}";
    
            echo $json;
        } else {
            echo "No coordinadores con ese id...";
        }
    } else {
        $query = "select * from coordinador";

        $result = $mysql->query($query);
    
        if ($mysql->affected_rows > 0) {
            $json = "{\"coordinadores\":[";
            while ($row = $result->fetch_assoc()) {
                $json = $json.json_encode($row);
                $json = $json.",";
            }
            $json = substr(trim($json), 0, -1);
            $json = $json."]}";
        
            echo $json;
        } else {
            echo "No hay datos guardados en esta tabla";
        }
    }

    $result->close();
    $mysql->close();

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fechaNac = $_POST["fechaNac"];
    $titulo = $_POST["titulo"];
    $email = $_POST["email"];
    $facultad = $_POST["facultad"];

    if (isset($_POST["id"])) {
        #Editar

        $query = "update coordinador set nombres = '".$nombres."', apellidos = '".$apellidos."',
            fechaNac = '".$fechaNac."', titulo = '".$titulo."', email = '".$email."', facultad = '".$facultad."' 
            where id = '".$id."'";

        $result = $mysql -> query($query);

        if($result){
            echo "Registro editado satisfactoriamente...";
        } else {
            echo "Error al editar el registro...";
        }

    } else {
        #Insertar

        $query = "insert into coordinador(nombres, apellidos, fechaNac, titulo, email, facultad) 
            values('".$nombres."', '".$apellidos."', '".$fechaNac."', '".$titulo."', '".$email."', '".$facultad."')";

        $result = $mysql -> query($query);

        if($result){
            echo "Registro guardado satisfactoriamente...";
        } else {
            echo "Error al guardar registro...";
        }
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
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
