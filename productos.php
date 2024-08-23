<h1>Agregar productos</h1>
<form action="RF.php" method="POST">
    <label for="nombre">Nombre:</label>
        <input type="text" name="nombre_p" id="" placeholder="Nombre">
        <br>

    <label for="nombre">Precio:</label>
        <input type="text" name="precio" id="" placeholder="Precio">
        <br>


        <input type="submit" value="Submit" name="productos">
</form>

<H1>Productos registrados</H1>

<form method="GET" action="">
    <input type="text" name="busqueda" placeholder="Buscar producto...">
    <button type="submit">Buscar</button>
</form>


<?php 

echo consultar_datos_productos($con, $busqueda);
?>

<style>
    .producto {
        width: 100%;
    padding: 15px;
    border: 1px solid #1d72b8;
    margin-bottom: 15px;
    border-radius: 8px;
    background-color: #ffffff;
}

.producto h3 {
    font-size: 18px;
    color: #1d72b8;
    margin-bottom: 10px;
}

.producto p {
    font-size: 14px;
    color: #333; 
}

.detalles {
    margin-top: 10px;
    padding: 10px;
    background-color: #f0f8ff; 
    border-radius: 5px;
    border-left: 4px solid #1d72b8;
}

.detalles p {
    margin: 5px 0;
    color: #1d72b8;
}

hr {
    border: 0;
    height: 1px;
    background-color: #1d72b8;
    margin: 20px 0;
}

.sin-datos {
    color: #ff0000;
    font-weight: bold;
}

</style>