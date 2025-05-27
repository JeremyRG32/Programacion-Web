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
<div style="background-color:whi; border-radius: 10px; " class="container-xl p-5 table-responsive">
    <div class="row">
        <div style="background-color:white; border-radius: 10px; margin-top: 40px; max-height: 450px;" class="container p-3 mx-0 col-md-4">
            <h2 class="text-center" style="font-weight: bold;"><?= $obra->titulo ?></h2>
            <img class="mt-3 rounded-3 img-fluid" src="<?= $obra->foto ?>">
            <h3 class="mt-1 text-center">Descripcion</h3>
            <p class="text-center" style="font-weight:normal;"><?= $obra->descripcion ?></p>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div>
                    <h3 style="font-weight: bold;">Personajes</h3>
                </div>
                <div class="d-block my-2">
                    <a href="agregar_personaje.php?codigo=<?= $_GET['codigo'] ?>">
                        <button style="border-radius: 13px; width: 125px; height: 40px; font-weight: bold; font-size: large;" class="btn btn-success">Agregar</button>
                    </a>
                </div>
            </div>
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
                        <th>Acciones</th>
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
                            <td><?= $p->edad ?></td>
                            <td><?= $p->sexo ?></td>
                            <td><?= $p->habilidades ?></td>
                            <td><?= $p->comida_favorita ?></td>
                            <td><?= $signo ?></td>
                            <td>
                                <a href="editar_personaje.php?codigo=<?= $obra->codigo ?>&cedula=<?= $p->cedula ?>" class="btn btn-warning mx-auto w-100">Editar</a>
                                <a href="eliminar_personaje.php?codigo=<?= $obra->codigo ?>&cedula=<?= $p->cedula ?>" class="btn btn-danger mx-auto w-100">Eliminar</a>
                            </td>
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