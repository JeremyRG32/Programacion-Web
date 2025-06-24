<?php
include("../library/layout.php");
plantilla::aplicar();

if ($_POST) {
    $usd = $_POST['mount'];
    $api = "https://api.exchangerate-api.com/v4/latest/USD";

    $response = @file_get_contents($api);
    if ($response) {
        $data = [];
        $data = json_decode($response, true);
    }

    if (!empty($data)) {
        $rates = $data['rates'];

        $conversion = [
            'DOP' => $usd * $rates['DOP'],
            'EUR' => $usd * $rates['EUR'],
            'MXN' => $usd * $rates['MXN'],
        ];
    } else {
        echo "<div class='container mt-4 p-3'>
                    <h3 class='fw-bold text-danger text-center'>No se pudo convertir la moneda intente de nuevo</h3>
                </div>";
    }
}
?>

<body class="Currency_body">
    <div class=" mt-4">
        <div id="input" class="container p-3 shadow">

            <div class="justify-content-center">
                <h1 class="fw-bold text-center">Conversion de divisas</h1>
                <img style="max-height: 75px; margin-left: 10px;" class="img-fluid mx-auto d-flex" src="/library/imgs/Currency.png">
            </div>

            <form method="POST" action="currency_conversion.php" class="d-flex">
                <label class="form-label">Ingrese el monto en dolares</label>
                <input type="number" autocomplete="off" required name="mount" class="form-control text-center" placeholder="0$">
                <button id="button" type="submit" class="mt-3 btn btn-success">Convertir</button>
            </form>

            <div id="result">
                <div class="container p-2">
                    <?php
                    if (!empty($data)) { ?>
                        <h4 class="fw-bold text-center">Resultados de la Conversión</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Pesos Dominicanos (DOP): <strong><?= number_format($conversion['DOP'], 2) ?> RD$</strong></li>
                            <li class="list-group-item">Euros (EUR): <strong><?= number_format($conversion['EUR'], 2) ?> €</strong></li>
                            <li class="list-group-item">Pesos Mexicanos (MXN): <strong><?= number_format($conversion['MXN'], 2) ?> MX$</strong></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>