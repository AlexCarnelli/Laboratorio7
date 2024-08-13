<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<style>

    form{
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 500px;
        background-color: #ccc;
        padding: 1rem;
    }

    form > input{

        font-size: 20px;
    }
</style>


<form action="RF.php" method="POST">

    <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="">
        <br>

    <label for="nombre">Apellido:</label>
        <input type="text" name="apellido" id="">
        <br>

    <label for="nombre">Email: </label>
        <input type="text" name="email" id="">
        <br>

    <label for="nombre">Pass: </label>
        <input type="password" name="pass" id="">
        <br>    
        <input type="submit" value="Submit" name="envio">
</form>
</body>
</html>