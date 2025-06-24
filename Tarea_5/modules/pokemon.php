<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $name = $_POST['name'];
    $api = "https://pokeapi.co/api/v2/pokemon/{$name}";

    $response = @file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);
    }

    if (!empty($data)) {
        $pokemon = [
            'id' => $data['id'],
            'name' => ucfirst($data['name']),
            'sprite' => $data['sprites']['front_default'],
            'experience' => $data['base_experience'],
            'abilities' => array_map(function ($a) {
                return $a['ability']['name'];
            }, $data['abilities']),
        ];
        $audio = "https://pokemoncries.com/cries/{$pokemon['id']}.mp3";
    } else {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>No se pudo encontrar ese pokemon intentelo de nuevo</h3>
                </div>";
    }
}
?>

<body class="Poke_body">
    <div class=" mt-4">
        <div id="input" class="container p-3 shadow">

            <div class="row justify-content-center">
                <div class="col-auto d-flex align-items-center">
                    <h1 class="fw-bold text-center d-flex align-items-center">
                        Pokedex
                        <img style="max-height: 75px; margin-left: 10px;" class="img-fluid" src="/library/imgs/Pokedex.png">
                    </h1>
                </div>
            </div>

            <form method="POST" action="pokemon.php" class="d-flex">
                <label class="form-label">Nombre del Pokemon</label>
                <input type="text" autocomplete="off" required name="name" class="form-control text-center" placeholder="Ej. pikachu, charmander, squirtle">
                <button id="button" type="submit" class="mt-3 btn btn-poke">Buscar</button>
            </form>

            <div id="result">
                <div class="container p-2">
                    <?php
                    if (!empty($pokemon)) { ?>


                        <div class="d-flex justify-content-between align-items-center text-center">
                            <h1 class="fw-bold flex-grow-1 text-center">Datos de <?= ucfirst($name) ?></h1>
                            <img id="audiobutton" style="height: 50px; cursor: pointer;" src="/library/imgs/Audio.png" alt="Audio">
                        </div>


                        <img style="height: 250px;" class="mx-auto d-flex" src="<?= $pokemon['sprite'] ?>">
                        <audio id="pokeaudio" autoplay>
                            <source src="<?= $audio ?>">
                        </audio>

                        <div class="text-center mb-1 row">
                            <h3 class="fw-bold col-6">Experiencia Base <br> <span class="fw-normal"><?= $pokemon["experience"] ?></span><br></h3>
                            <div class="col-6">
                                <h3 class="fw-bold"> Habilidades Base</h3>
                                <h4>
                                    <?php foreach ($pokemon['abilities'] as $a) {
                                    ?> <li><?= ucfirst($a) ?></li>

                                    <?php } ?>
                                </h4>
                            </div>
                        </div>

                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="/library/script.js"></script>