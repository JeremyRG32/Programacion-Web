<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 1 Programacion Web</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: whitesmoke;
            margin: auto;
            padding: 0;
        }

        #tarea1 {
            max-width: 1300px;
            margin: auto;
            padding: 30px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 2px black;
        }

        #menu{
            text-align: center;
            padding: 10px;
            background-color: #023877;
        }

        #menu ul {
            list-style-type: none;
            padding: 0;
        }

        #menu li {
            display: inline;
            margin: 15px;
        }
        #menu a{
            text-decoration: none;
            color: whitesmoke;
            font-weight: bold;
        }
        #menu a:hover{
            color: rgb(0, 136, 255);
        }
        #contenido{
            min-height: 400px;
        }
    </style>
</head>
<body>
    <div id="tarea1">
        <div>
            <h1>Tarea 1</h1>
        </div>
        <div id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="tarjeta.php">Tarjeta</a></li>
                <li><a href="calculadora.php">Calculadora</a></li>
                <li><a href="adivina.php">Adivina</a></li>
                <li><a href="acerca_de.php">Acerca de</a></li>
            </ul>
        </div>
        <div id="contenido">