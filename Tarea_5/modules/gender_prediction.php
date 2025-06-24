<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $name = $_POST['name'];
    $api = "https://api.genderize.io/?name={$name}";

    $response = file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);
    }

    if (!empty($data)) {
        if ($data['gender'] == null) {
            $gender = "Desconocido";
        } else {
            $gender = $data['gender'];
        }

        $probability = $data['probability'];
        $probability *= 100;
        $probability = (string)$probability;
        $probability = $probability . "%";
    }
    if ($gender == "male") {
        $genderbackground = "male";
    } else if ($gender == "female") {
        $genderbackground = "female";
    } else {
        $genderbackground = "unknown";
    }
}


?>

<body class="Age_body">


    <div class="container shadow mt-5 p-3 text-center">
        <h3 class="fw-bold">Prediccion de Genero</h3>
        <p>Escriba un nombre y adivinaremos el genero de la persona<br><span class="icon">👧👦</span></p>

        <form method="post" action="gender_prediction.php">

            <label class="form-label">Nombre</label>
            <input required autocomplete="off" placeholder="Ej: Juan, Maria, Jose, Pedro" name="name" type="text" class="text-center form-control input-centered">

            <button type="submit" class="btn btn-primary mt-3 ">Confirmar</button>

            <div id="result" class="mt-4 d-flex justify-content-center ">
                <?php if (!empty($gender)) { ?>
                    <div class="p-4 text-center shadow rounded-4 row <?= $genderbackground ?>">
                        <h2 class="mb-3 fw-bold">Resultado</h2>
                        <div class="col-6">
                            <?php if ($gender == "male") { ?>
                                <h3>Masculino <br> <span class="icon">👦</span></h3>
                            <?php } elseif ($gender == "female") { ?>
                                <h3>Femenino <br> <span class="icon">👧</span></h3>
                            <?php } else { ?>
                                <h3>Desconocido <br> <span class="icon">❓</span></h3>
                            <?php } ?>
                        </div>
                        <div class="col-6">
                            <h3>Probabilidad</h3>
                            <h3><?= $probability ?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
</body>