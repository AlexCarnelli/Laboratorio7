<?php

require("conexion.php");


$con= conectar_bd();


function consultar_datos($con) {
    $consulta = "SELECT * FROM usuarios";
    $resultado = mysqli_query($con, $consulta);
   
    // Inicializo una variable para guardar los resultados
    $salida = "";
   
    //si se recupera algun registro de la consulta
    if (mysqli_num_rows($resultado) > 0) {

        //mientras haya registros..
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "id: " . $fila["id_user"] . " - Nombre: " . $fila["nombrecompleto"] . " - Email: " . $fila["email"] . "<br> <hr>";
        }
    } else {
        $salida = "Sin datos ";
    }

    return $salida;
}


//puedo darle un formato a la salida

$salida= consultar_datos($con);
mysqli_close($con);   

echo $salida;

