<h1>Agregar clientes</h1>
<form action="RF.php" method="POST">
    <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="" placeholder="Nombre">
        <br>

    <label for="nombre">Apellido:</label>
        <input type="text" name="apellido" id="" placeholder="Apellido">
        <br>

    <label for="nombre">Email: </label>
        <input type="text" name="email" id="" placeholder="Email">
        <br>

    <label for="nombre">Calle donde vive: </label>
        <input type="text" name="calle" id="" placeholder="Calle">
        <br>    

        <label for="nombre">Número de casa: </label>
        <input type="text" name="nro" id="" placeholder="Número de casa">
        <br>    
        <input type="submit" value="Submit" name="cliente">
</form>

<H1>Clientes registrados</H1>



<?php 
errores_inserccion_clientes();
echo consultar_datos_clientes($con);


?>

<!-- No me tomaba el css desde el archivo y no termino de entender el por qué. Aca si me funciona -->
<style>
.cliente-container {
    width: 100%;
    padding: 15px;
    border: 1px solid #1d72b8;
    margin-bottom: 15px;
    border-radius: 8px;
    background-color: #ffffff; 
}

.cliente-id,
.cliente-nombre,
.cliente-email {
    font-size: 16px;
    color: #1d72b8;
    margin: 5px 0;
}

hr {
    border: 0;
    height: 1px;
    background-color: #1d72b8;
    margin: 15px 0;
}

.sin-datos {
    font-size: 18px;
    color: #ff0000;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
}


.error-messages {
    padding: 10px;
    border: 1px solid #ff0000;
    background-color: #ffe6e6;
    color: #ff0000;
    margin-bottom: 15px;
    border-radius: 5px;
}

.success-message {
    padding: 10px;
    border: 1px solid #1d72b8;
    background-color: #e6f7ff;
    color: #1d72b8;
    margin-bottom: 15px;
    border-radius: 5px;
}

.error-messages p,
.success-message p {
    margin: 0;
    font-size: 14px;
}

</style>