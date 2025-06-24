<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $name = urlencode($_POST['name']);
    $api = "http://universities.hipolabs.com/search?country={$name}";

    $response = file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);
    }

    if (!empty($data)) {
        echo "";
    } else {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>País no encontrado intentelo de nuevo</h3>
                </div>";
    }
}
?>

<body class="University_body">
    <div class="University_box container shadow text-center p-3 mt-4">
        <img style="height: 100px;" class="img-fluid" src="../library/imgs/University.png">
        <h3 class="fw-bold">Universidades de un pais</h3>
        <p>Escriba el nombre de un pais en ingles y mostraremos sus universidades<br></p>
        <form method="post" action="universities.php">

            <label class="form-label">Nombre</label>
            <input autocomplete="off" placeholder="Ej: Dominican Republic" name="name" type="text" class="text-center form-control input-centered">

            <button type="submit" class="btn btn-dark mt-3 ">Confirmar</button>
        </form>
    </div>
</body>

<div id="result" class="d-flex justify-content-center">
    <?php if (!empty($data)) { ?>
        <div style="background-color: white;" class="p-4 text-center shadow rounded-4 mt-4">
            <h2 class="mb-3 fw-bold">Universidades de <?= urldecode($name) ?> </h2>

            <table class="table table-striped">
                <tr>
                    <thead>
                        <th>Nombre</th>
                        <th>Dominios</th>
                        <th>Links</th>
                    </thead>
                </tr>
                <?php
                foreach ($data as $d) {
                ?>
                    <tr>
                        <td><?= $d['name'] ?></td>
                        <td>
                            <?php
                            foreach ($d['domains'] as $domain) {
                                echo $domain . "<br>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($d['web_pages'] as $web) {
                                echo $web . "<br>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    <?php } ?>
</div>