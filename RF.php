<?php

require("conexion.php");

$con= conectar_bd();

if(isset($_POST["cliente"])){


    $nombre= $_POST["nombre"];
    $apellido= $_POST["apellido"];
    $email= $_POST["email"];
    $calle= $_POST["calle"];
    $nro= $_POST["nro"];
   

    insertar_datos_clientes($con, $nombre, $apellido, $email, $calle, $nro);
}

if(isset($_POST["productos"])){


    $nombre= $_POST["nombre_p"];
    $precio= $_POST["precio"];

   

    insertar_datos_productos($con, $nombre, $precio);
}


function insertar_datos_productos($con, $nombre, $precio){


    $consulta_insertar= "INSERT INTO productos(nombre, precio)  VALUES( '$nombre', '$precio') ";

    if (mysqli_query($con, $consulta_insertar)) {
        
        echo "todo bien";
       // consultar_datos($con);
        header("location: index.php");

  } else {
        echo "Error: " . $consulta_insertar . "<br>" . mysqli_error($con);
  }

}


function insertar_datos_clientes($con, $nombre, $apellido, $email, $calle, $nro) {
   
    $errores = [];

   // empty verifica que el dato no es vacio
    if (empty($nombre) || empty($apellido) || empty($email) || empty($calle) || empty($nro)) {
        $errores[] = "Todos los campos son obligatorios.";
    }

    // valida el formato de email. Fuente: https://www.php.net/manual/es/filter.filters.validate.php
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email es incorrecto.";
    }

   
    if (empty($errores)) {
        $consulta_verificar = "SELECT * FROM clientes WHERE email = '$email'";
        $resultado_verificar = mysqli_query($con, $consulta_verificar);

        if (mysqli_num_rows($resultado_verificar) > 0) {
            $errores[] = "El cliente con este email ya está registrado.";
        }
    }

    // Si hay errores, guardarlos en la sesión y redirigir al index
    if (!empty($errores)) {
        session_start();
        $_SESSION['errores'] = $errores;
        header("location: index.php");
        exit();
    }

    // Si no hay errores, proceder con la inserción
    $nombreCompleto = $nombre . ' ' . $apellido;
    $direccion = $calle . ' ' . $nro;

    $consulta_insertar = "INSERT INTO clientes(nombreC, email, direccion) VALUES('$nombreCompleto', '$email', '$direccion')";

    if (mysqli_query($con, $consulta_insertar)) {
        session_start();
        $_SESSION['mensaje'] = "Cliente insertado correctamente.";
        header("location: index.php");
        exit();
    } else {
        session_start();
        $_SESSION['errores'] = ["Error al insertar los datos: " . mysqli_error($con)];
        header("location: index.php");
        exit();
    }
}

function errores_inserccion_clientes () {
    
// Mostrar errores
if (isset($_SESSION['errores']) && !empty($_SESSION['errores'])) {
    echo '<div class="error-messages">';
    foreach ($_SESSION['errores'] as $error) {
        echo '<p>' . htmlspecialchars($error) . '</p>';
    }
    echo '</div>';
    unset($_SESSION['errores']); 
}

// Mostrar mensaje de éxito
if (isset($_SESSION['mensaje'])) {
    echo '<div class="success-message">';
    echo '<p>' . htmlspecialchars($_SESSION['mensaje']) . '</p>';
    echo '</div>';
    unset($_SESSION['mensaje']); // unset limpia la session de mensaje
}
}
 
function consultar_datos_clientes($con) {
    $consulta = "SELECT * FROM clientes";
    $resultado = mysqli_query($con, $consulta);
    $salida = "";

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= '<div class="cliente-container">';
            $salida .= '<p class="cliente-id">ID: ' . $fila["Cod_cli"] . '</p>';
            $salida .= '<p class="cliente-nombre">Nombre: ' . $fila["nombreC"] . '</p>';
            $salida .= '<p class="cliente-email">Email: ' . $fila["email"] . '</p>';
            $salida .= '<hr>';
            $salida .= '</div>';
        }
    } else {
        $salida = '<p class="sin-datos">Sin datos</p>';
    }

    return $salida;
}




$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';



function consultar_datos_productos($con, $busqueda = '') {


    if ($busqueda != '') {
        $consulta = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";
    } else {
        $consulta = "SELECT * FROM productos";
    }
    
    $resultado = mysqli_query($con, $consulta);
    
    $salida = "";
   
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "<div class='producto'>";
            $salida .= "<h3>ID: " . $fila["Cod_p"] . " - " . $fila["nombre"] . "</h3>";
            $salida .= "<p>Precio: $" . $fila["precio"] . "</p>";

          
            $id_producto = $fila["Cod_p"];
            $consultaDetalles = "SELECT * FROM detalles WHERE Cod_P = '$id_producto'";
            $resultadoDetalles = mysqli_query($con, $consultaDetalles);

            if (mysqli_num_rows($resultadoDetalles) > 0) {
                $salida .= "<div class='detalles'>";
                while ($detalle = mysqli_fetch_assoc($resultadoDetalles)) {
                    $salida .= "<p>Origen: " . $detalle["Origen"] . "</p>";
                    $salida .= "<p>Detalles: " . $detalle["Descripcion"] . "</p>";
                }
                $salida .= "</div>";
            } else {
                $salida .= "<p>Sin detalles disponibles para este producto.</p>";
            }

            $salida .= "</div><hr>";
        }
    } else {
        $salida = "<p>No se encontraron productos.</p>";
    }

    return $salida;
}





function consultar_datos_compras($con) {
    $consulta = "SELECT * FROM compras";
    $resultado = mysqli_query($con, $consulta);
    $salida = "";

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= '<div class="compra-container">';
            $salida .= '<p class="compra-cod_cli">Código Cliente: ' . $fila["cod_cli"] . '</p>';
            $salida .= '<p class="compra-cod_prod">Código Producto: ' . $fila["cod_prod"] . '</p>';
            $salida .= '<p class="compra-fecha">Fecha: ' . $fila["fecha"] . '</p>';
            $salida .= '<hr>';
            $salida .= '</div>';
        }
    } else {
        $salida = '<p class="sin-datos">Sin datos</p>';
    }

    return $salida;
}










