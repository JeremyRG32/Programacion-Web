<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $name = urlencode($_POST['name']);
    $api = "https://api.unsplash.com/photos/random?query={$name}&client_id=cMemU0x4IaWy2dnVEmR4XKY4RX8QM1kRBcPfueR9yTw";;

    $response = @file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);
    }

    if (!empty($data)) {
        $image = $data['urls']['regular'];
    } else {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>No se pudo generar la imagen</h3>
                </div>";
    }
}
?>

<body class="Ai_body">
    <div class=" mt-4">
        <div id="input" class="container p-3 shadow">

            <div class="row justify-content-center">
                <div class="col-auto d-flex align-items-center">
                    <h1 class="fw-bold text-center d-flex align-items-center">
                        Imagenes 🖼️
                    </h1>
                </div>
            </div>

            <form method="POST" action="images.php" class="d-flex">
                <input type="text" autocomplete="off" required name="name" class="form-control text-center" placeholder="Escriba el texto aqui">
                <button id="button" type="submit" class="mt-3 btn btn-primary">Buscar imagen</button>
            </form>

        </div>
    </div>

    <div id="result">
        <?php
        if (!empty($data)) { ?>

            <div class="container p-2 mt-3">
                <img class="rounded d-flex mx-auto" style="max-height: 300px;" src=<?=$image?>>
            </div>

        <?php } ?>
</body>