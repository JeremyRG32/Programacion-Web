<?php
include("../library/layout.php");
plantilla::aplicar();
$errormessage = "";

if ($_POST) {
    $name = urlencode($_POST['name']);
    $api = "https://api.openweathermap.org/data/2.5/weather?q={$name},DO&appid=2e4acedfc41077d62d49b5bce2e0dfe0&units=metric&lang=es";

    $response = @file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);
    }

    if (!empty($data)) {
        $temp = round($data['main']['temp']);
        $desc = ucfirst($data['weather'][0]['description']);
        $icon = $data['weather'][0]['icon'];
        $weatherType = $data['weather'][0]['main'];

        switch ($weatherType) {
            case 'Clear':
                $background = 'sunny';
                break;
            case 'Clouds':
                $background = 'cloudy';
                break;
            case 'Rain':
            case 'Drizzle':
                $background = 'rainy';
                break;
            case 'Thunderstorm':
                $background = 'stormy';
                break;
            default:
                $background = 'default-bg';
        }
    } else {
        $errormessage = "No se pudo encontrar la ciudad.";
    }
}


?>

<body class="Weather_body">
    <div class="container shadow text-center p-3 mt-4">
        <img style="height: 100px;" class="img-fluid" src="../library/imgs/Weather.png">
        <h3 class="fw-bold">Clima en Republica Dominicana</h3>
        <p>Escribe el nombre de una ciudad y te diremos su clima<br></p>

        <form method="post" action="weather.php">

            <label class="form-label">Nombre</label>
            <input autocomplete="off" placeholder="Ej: Santo Domingo, La Romana" name="name" type="text" class="text-center form-control input-centered">

            <button type="submit" class="btn btn-primary mt-3 ">Confirmar</button>
        </form>

        <div class="weatherbox text-center mx-auto">

            <div id="result" class="mt-4 d-flex justify-content-center">
                <?php
                if (!empty($temp)) {
                ?>
                    <div class="weatherbox p-2 rounded-2 text-center text-white <?= $background ?>">
                        <h4>Clima en <?= ucwords(urldecode($name))?></h4>
                        <img src=<?= "https://openweathermap.org/img/wn/{$icon}@2x.png" ?>> <br>

                        <h3><?= $desc ?></h3> <br>
                        <h3><?= $temp . "°C" ?></h3>
                    </div>
                <?php
                } else if (empty($temp)) {
                ?> <h4><?= $errormessage ?></h4>
                <?php
                }
                ?>

            </div>
        </div>
    </div>


</body>