<?php
class plantilla
{
    static $instance = null;

    public static function aplicar()
    {
        if (self::$instance == null) {
            self::$instance = new plantilla();
        }
        return self::$instance;
    }

    function __construct()
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>APIs</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="/library/style.css">
        </head>

        
            <div id="menu">
                <nav id="menu-items" class="d-flex justify-content-center justify-content-between px-5">
                    <a class="nav-link" href="/index.php">Inicio</a>
                    <a class="nav-link" href="/modules/gender_prediction.php">Prediccion de Genero</a>
                    <a class="nav-link" href="/modules/age_prediction.php">Prediccion de edad</a>
                    <a class="nav-link" href="/modules/universities.php">Universidades</a>
                    <a class="nav-link" href="/modules/weather.php">Clima</a>
                    <a class="nav-link" href="/modules/pokemon.php">Pokemon</a>
                    <a class="nav-link" href="/modules/wordpress.php">WordPress</a>
                    <a class="nav-link" href="/modules/currency_conversion.php">Conversion de divisas</a>
                    <a class="nav-link" href="/modules/images.php">Imagenes</a>
                    <a class="nav-link" href="/modules/countries.php">Paises</a>
                    <a class="nav-link" href="/modules/jokes.php">Chistes</a>
                </nav>
            </div>
        <?php
        
    }

    function __destruct()
    {
        ?>
        </html>
        <?php
    } 
}
