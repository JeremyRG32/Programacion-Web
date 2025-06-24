<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $name = urlencode($_POST['name']);
    $api = "https://restcountries.com/v3.1/name/{$name}";

    $response = @file_get_contents($api);
    if ($response) {
        $json = json_decode($response, true);
        $data = [];
        $data = $json[0];
    }

    if (!empty($data)) {
        $currencies = $data['currencies'];
        $code = array_key_first($currencies);
    } else {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>No se pudo encontrar el pais</h3>
                </div>";
    }
}
?>

<body class="Ai_body">
    <div class=" mt-4">
        <div id="input" class="container p-3 shadow">

            <div class="row justify-content-center text-center">
                <div class="col-auto d-flex align-items-center">
                    <h1 class="fw-bold text-center d-flex align-items-center">
                        Datos de Paises 🌍
                    </h1>
                </div>
                <p>Escribe el nombre de un pais en ingles y te mostraremos sus datos</p>
            </div>

            <form method="POST" action="countries.php" class="d-flex">
                <input type="text" autocomplete="off" required name="name" class="form-control text-center" placeholder="Ej: Dominican">
                <button id="button" type="submit" class="mt-3 btn btn-primary">Buscar País</button>
            </form>

        </div>
    </div>

    <div id="result">
        <?php
        if (!empty($data)) { ?>

            <div style="width: 1200px" class="boxcountry shadow mx-auto p-3 mt-3 text-center">
                <h1 class="fw-bold">Datos de <?= $data['name']['common'] ?></h1>
                <img class="rounded d-flex mx-auto" style="max-height: 300px;" src="<?= $data['flags']['svg'] ?>">

                <div class="row">
                    <div class="col-4">
                        <h2 class="fw-bold">Capital</h2>
                        <h3><?= $data['capital'][0] ?></h3>
                    </div>

                    <div class="col-4">
                        <h2 class="fw-bold">Poblacion</h2>
                        <h3><?= number_format($data['population']) ?></h3>
                    </div>

                    <div class="col-4">
                        <h2 class="fw-bold">Moneda</h2>
                        <div class="d-flex justify-content-center">
                            <h3 class="me-2"><?= $data['currencies'][$code]['symbol']?></h3>
                            <h3><?= $data['currencies'][$code]['name'] ?></h3>
                        </div>
                    </div>
                </div>


            </div>

        <?php } ?>
</body>