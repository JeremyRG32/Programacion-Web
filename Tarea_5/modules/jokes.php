<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $api = "https://official-joke-api.appspot.com/random_joke";

    $response = @file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);  
    }

    if (!empty($data)) {
        $setup = $data['setup'];
        $punchline = $data['punchline'];

    } else {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>No se pudo encontrar el pais</h3>
                </div>";
    }
}
?>

<body class="Joke_body">
    <div class=" mt-4">
        <div id="input" class="container p-3 shadow">

            <div class="row justify-content-center text-center">
                <div class="col-auto d-flex align-items-center">
                    <h1 class="fw-bold text-center d-flex align-items-center">
                        Generador de chistes 🤣
                    </h1>
                </div>
            </div>

            <form method="POST" action="jokes.php">
                <input type="text" name="joke" value="hola" hidden>
                <button id="button" type="submit" class="btn btn-warning">Generar Chiste</button>
            </form>

        </div>
    </div>

    <div id="result">
        <?php
        if (!empty($data)) { ?>

            <div style="width: 900px;" class="boxcountry shadow mx-auto mt-3 text-center">
                <h1 class="fw-bold"><?=$setup?></h1>
            
                
                <div id="punchline" class="mt-4">
                    <h1 class="fw-bold"><?=$punchline?></h1>
                </div>

                    <button id="punchbutton" style="height: 50px; width: 120px;" class="btn btn-warning mt-5">Continuar</button>
            </div>

        <?php } ?>
</body>

<script src="/library/script.js"></script>
