<h1>Compras realizadas</h1>

<?php 

echo consultar_datos_compras($con);
?>
<style>
    .compra-container {
        width: 100%;
    padding: 15px;
    border: 1px solid #1d72b8;
    margin-bottom: 15px;
    border-radius: 8px;
    background-color: #ffffff; /* Fondo blanco */
}

.compra-cod_cli,
.compra-cod_prod,
.compra-fecha {
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

</style>