<?php
include("../library/layout.php");
plantilla::aplicar();
$data = [];

if ($_POST) {
    $site = urlencode($_POST['site']);
    $api = "https://{$site}/wp-json/wp/v2/posts?per_page=3";

    $response = @file_get_contents($api);
    if ($response) {
        $data = json_decode($response, true);
    }

    if (empty($data)) {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>No se pudieron obtener las noticias</h3>
                </div>";
    }
}


?>

<body class="Wordpress_body">
    <div class="container shadow text-center p-3 mt-4">
        <img style="height: 100px;" class="img-fluid" src="../library/imgs/WordPress.png">
        <h3 class="fw-bold">Noticias de Wordpress</h3>
        <p>Eliga uno Sitio web para obtener las noticias<br></p>

        <form method="post" action="wordpress.php">
            <label for="site">Selecciona un sitio:</label>
            <select name="site" id="site" class="form-select w-50 text-center">
                <option value="">-- Elige uno --</option>
                <option value="techcrunch.com">TechCrunch</option>
                <option value="wptavern.com">WP Tavern</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Buscar Noticias</button>
        </form>
    </div>

    <div id="result" class="mt-4 d-flex justify-content-center">
        <?php
        if (!empty($data)) { ?>
            <div class="mt-4">
                <h2 class="text-center">📰 Últimas Noticias de WordPress en <?= ($site) ?></h2>
                    <div class="container">
                        <?php foreach ($data as $d) {
                            $count = 0;
                            if($count++ >= 3){break;}
                            ?>
                            <div class="card my-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $d['title']['rendered'] ?></h5>
                                    <p class="card-text"><?= $d['excerpt']['rendered'] ?></p>
                                    <a href="<?= $d['link'] ?>" class="btn btn-outline-primary">Leer más</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                <?php } ?>
    </div>
</body>