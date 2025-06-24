<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $name = $_POST['name'];
    $api = "https://api.agify.io/?name={$name}";

    $response = file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);
    }

    if (!empty($data)) {
        $age = $data['age'];
    }
    if ($age == null) {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>No se pudo determinar la edad intente con otro nombre</h3>
                </div>";
    }
}


?>

<body class="Age_body">

    
        <div class="container shadow mt-5 p-3 text-center">
            <h3 class="fw-bold">Prediccion de edad</h3>
            <p>Escriba un nombre y adivinaremos la edad de la persona</p>

            <form method="post" action="age_prediction.php">

                <label class="form-label">Nombre</label>
                <input required autocomplete="off" placeholder="Ej: Juan, Maria, Jose, Pedro" name="name" type="text" class="text-center form-control input-centered">

                <button type="submit" class="btn btn-primary mt-3 ">Confirmar</button>

                <div id="result" class="mt-4 d-flex justify-content-center">
                    <?php if (!empty($age)) { ?>
                        <div style="background-color: #9ac2ea;" class="p-4 text-center shadow rounded-4 row">
                            <h2 class="mb-3 fw-bold">Resultado</h2>
                            <div class="row">
                                <div class="col-6">
                                    <h3>Edad</h3>
                                    <h3><?= $age ?></h3>
                                </div>
                                <?php
                                if ($age < 18) {
                                ?>
                                    <div class="col-6">
                                        <h3>Es un joven</h3>
                                        <h3 class="icon">👶</h3>
                                    </div>
                                <?php
                                } elseif ($age < 60) {
                                ?>
                                    <div class="col-6">
                                        <h3>Es un adulto</h3>
                                        <h3 class="icon">🧑</h3>
                                    </div>
                                <?php
                                } elseif ($age >= 60) {
                                ?>
                                    <div class="col-6">
                                        <h3>Es un anciano</h3>
                                        <h3 class="icon">👴</h3>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-6">
                                        <h3 class="text-danger">No se pudo determinar la edad</h3>
                                        <h3 class="icon">❓</h3>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>

</body>