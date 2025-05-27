<?php
include('layout/header.php');
if (isset($_GET['codigo'])) {
    $obra = new obra;
    if (is_file('datos/' . $_GET['codigo'] . '.json')) {
        $json = file_get_contents('datos/' . $_GET['codigo'] . '.json');
        $obra = json_decode($json);
    }
}
?>
<div style="background-color:whitesmoke; border-radius: 10px; " class="container-xl p-5 table-responsive">
    <div class="d-block text-end ">
        <button onclick="window.print()" style="border-radius: 13px; width: 125px; height: 40px; background-color: white; border: none; color: black; font-weight: bold; font-size: large;" class="btn btn-primary shadow">Imprimir</button>
    </div>
    <div>
        <div style="background-color: white; border-radius: 30px; width: 300px;" class="container p-3 shadow">
            <h1 class="text-center" style="font-weight:bold;">Detalles</h1>
        </div>

        <div style="background-color:white; border-radius: 10px; margin-top: 40px; max-width: 800px;" class="d-block mx-auto container p-3 mx-0">
            <h2 class="text-center" style="font-weight: bold;"><?= $obra->titulo ?></h2>
            <img style="height: 300px;" class="d-block mt-3 rounded-3 mx-auto" src="<?= $obra->foto ?>">
            <h2 class="text-center mt-4">Datos de la obra</h2>
            <table class="table table-striped table-bordered table-hover align-middle mt-2">
                <thead>
                    <tr class="table-primary text-center">
                        <th>Codigo</th>
                        <th>Titulo</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        <th>Personajes</th>
                        <th>Pais</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><? echo $obra->codigo ?></td>
                        <td><? echo $obra->titulo ?></td>
                        <td><? echo $obra->tipo ?></td>
                        <td><? echo $obra->descripcion ?></td>
                        <td><? echo count($obra->personajes); ?></td>
                        <td><? echo $obra->pais ?></td>
                        <td><? echo $obra->autor ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            <div class="row">

            </div>
        </div>
        <div style="background-color: white; border-radius: 30px; width: 300px;" class="container p-3 shadow mt-5">
            <h1 class="text-center" style="font-weight:bold;">Personajes</h1>
        </div>
        <div style="background-color:white; border-radius: 10px; margin-top: 40px;" class="d-block mx-auto container p-3 mx-0">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="table-primary">
                        <th>Cedula</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de nacimiento</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Habilidades</th>
                        <th>Comida favorita</th>
                        <th>Signo zodiacal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($obra->personajes as $p) {
                        $fecha = explode('-', $p->fecha_nacimiento);
                        $mes = (int)$fecha[1];
                        $dia = (int)$fecha[2];
                        $signo = '';
                        switch ($mes) {
                            case 1:
                                $signo = ($dia <= 19) ? 'Capricornio' : 'Acuario';
                                break;
                            case 2:
                                $signo = ($dia <= 18) ? 'Acuario' : 'Piscis';
                                break;
                            case 3:
                                $signo = ($dia <= 20) ? 'Piscis' : 'Aries';
                                break;
                            case 4:
                                $signo = ($dia <= 19) ? 'Aries' : 'Tauro';
                                break;
                            case 5:
                                $signo = ($dia <= 20) ? 'Tauro' : 'Géminis';
                                break;
                            case 6:
                                $signo = ($dia <= 20) ? 'Géminis' : 'Cáncer';
                                break;
                            case 7:
                                $signo = ($dia <= 22) ? 'Cáncer' : 'Leo';
                                break;
                            case 8:
                                $signo = ($dia <= 22) ? 'Leo' : 'Virgo';
                                break;
                            case 9:
                                $signo = ($dia <= 22) ? 'Virgo' : 'Libra';
                                break;
                            case 10:
                                $signo = ($dia <= 22) ? 'Libra' : 'Escorpio';
                                break;
                            case 11:
                                $signo = ($dia <= 21) ? 'Escorpio' : 'Sagitario';
                                break;
                            case 12:
                                $signo = ($dia <= 21) ? 'Sagitario' : 'Capricornio';
                                break;
                        }
                    ?>
                        <tr style="background-color: white;">
                            <td><?= $p->cedula ?></td>
                            <td><img class="d-block mx-auto" style="height: 100px;" src="<?= $p->foto ?>"></td>
                            <td><?= $p->nombre ?></td>
                            <td><?= $p->apellido ?></td>
                            <td><?= $p->fecha_nacimiento ?></td>
                            <td><?= $p->edad?></td>
                            <td><?= $p->sexo ?></td>
                            <td><?= $p->habilidades ?></td>
                            <td><?= $p->comida_favorita ?></td>
                            <td><?= $signo ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include('layout/footer.php');
?>