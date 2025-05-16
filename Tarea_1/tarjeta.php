<?php
$nombre = "Jeremy";
$apellido = "Reyes Gonzalez";
$edad = 20;
$carrera = "Software";
$universidad = "ITLA";
$mensaje  = ($edad >= 18) ? "Soy mayor de edad" : "Soy menor de edad";
require('layout/header.php'); ?>

<style>
    #tarjeta {
        width: 400px;
        margin: 30px auto;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 20px;
        box-shadow: 0 0 2px;
        background-color: rgb(239, 239, 239);
        text-align: center;
    }

    #tarjeta table {
        border-collapse: collapse;

    }

    #tarjeta td {
        background-color: white;
        width: 30%;
        padding: 10px;
    }

    #tarjeta th {
        color: white;
        background-color: #023877;
        width: 20%;
    }

    .mensaje {
        margin: -1px auto;
        padding: 15px;
        background-color: #023877;
        text-align: center;
        font-size: larger;
        font-weight: bold;
        border-top: 1px solid rgba(239, 239, 239, 0.4);
        color: white;
    }
</style>

<div id="tarjeta">
    <h2 style="text-align: center;">Esta es mi tarjeta</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <td> <?php echo $nombre; ?> </td>
        </tr>
        <tr>
            <th>Apellidos</th>
            <td> <?php echo $apellido; ?> </td>
        </tr>
        <tr>
            <th>Edad</th>
            <td> <?php echo $edad; ?> </td>
        </tr>
        <tr>
            <th>Carrera</th>
            <td> <?php echo $carrera; ?> </td>
        </tr>
        <tr>
            <th>Universidad</th>
            <td> <?php echo $universidad; ?> </td>
        </tr>
    </table>
    <div class="mensaje"> <?php echo $mensaje; ?> </div>
</div>

<?php

require('layout/footer.php'); ?>