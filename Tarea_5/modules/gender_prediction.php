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
    }
}


?>

<div class="centered">
    <div class="box text-center">
        <h3 class="fw-bold">Prediccion de genero</h3>
        <p>Escriba un nombre y adivinaremos el genero de la persona</p>

        <form method="post" action="gender_prediction.php">

            <label class="form-label">Nombre</label>
            <input autocomplete="off" placeholder="Ej: Juan, Maria, Jose, Pedro" name="name" type="text" class="text-center form-control input-centered">

            <button type="submit" class="btn btn-light mt-3 ">Predecir</button>

            <div id="result" class="mt-4 d-flex justify-content-center">
                <?php if (!empty($gender)) { ?>
                    <div style="background-color: white;" class="p-4 text-center shadow rounded-4 row">
                        <h2 class="mb-3 fw-bold">Resultado</h2>
                        <div class="col-6">
                            <?php if ($gender == "male") { ?>
                                <h3>Masculino <br> <span style="font-size: 2.5rem;">👦</span></h3>
                            <?php } elseif ($gender == "female") { ?>
                                <h3>Femenino <br> <span style="font-size: 2.5rem;">👧</span></h3>
                            <?php } else { ?>
                                <h3>Desconocido <br> <span style="font-size: 2.5rem;">❓</span></h3>
                            <?php } ?>
                        </div>
                        <div class="col-6">
                            <h3>Probabilidad</h3>
                            <h3><?=$probability?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </form>
    </div>
</div>