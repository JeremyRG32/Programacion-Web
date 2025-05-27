<?php
include('layout/header.php');
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $obra = new obra();
    $personaje = new Personaje();
    if (is_file('datos/' . $codigo . '.json')) {
        $json = file_get_contents('datos/' . $codigo . '.json');
        $obra = json_decode($json);
    }
} else {
}
if (isset($_GET['cedula'])) {
    $personaje = new Personaje();
    foreach ($obra->personajes as $p) {
        if ($p->cedula == $_GET['cedula']) {
            $cedula = $p->cedula;
            $personaje = $p;
        }
    }
} else {
}

if ($_POST) {
    $personaje = new Personaje();
    $personaje->cedula = $_POST['cedula'];
    $personaje->foto = $_POST['foto'];
    $personaje->nombre = $_POST['nombre'];
    $personaje->apellido = $_POST['apellido'];
    $personaje->fecha_nacimiento = $_POST['fecha_nacimiento'];
    $personaje->sexo = $_POST['sexo'];
    $personaje->comida_favorita = $_POST['comida_favorita'];
    $personaje->habilidades = $_POST['habilidades'];
    $personaje->edad = $_POST['edad'];



    array_push($obra->personajes, $personaje);
    file_put_contents('datos/' . $codigo . '.json', json_encode($obra));

?>
    <div class='alert-success container rounded text-center p-3 w-25'>Personaje guardado</div>
    <a href='index.php' class='btn btn-primary container mt-3'>Volver</a>

<?
    exit();
}
?>
<div style="background-color: rgba(109, 108, 108, 0.33); border-radius: 10px; " class="container-xl p-5">
    <div class="row">
        <div style="background-color:white; border-radius: 10px; margin-top: 40px; max-height: 500px;" class="container p-3 mx-0 col-md-4">
            <h2 class="text-center" style="font-weight: bold;"><?= $obra->titulo ?></h2>
            <img class="mt-3 rounded-3 img-fluid" src="<?= $obra->foto ?>">
            <h3 class="mt-1 text-center">Descripcion</h3>
            <p class="text-center" style="font-weight:normal; font-size:large"><?= $obra->descripcion ?></p>
        </div>
        <div class="col-md-8">
            <div class="row">
                <h3 class="text-center" style="font-weight: bold;">Agregar un Personaje</h3>
                <form action="agregar_personaje.php?codigo=<?= $_GET['codigo'] ?>" method="POST">
                    <?php if ($_POST) {
                    ?>
                        <label class="form-label mt-1">Foto</label> <br>
                        <img style="height: 200px; border-radius: 5px;" src="<?= $personaje->foto ?>"> <br>
                    <? } else {
                    ?>
                        <label class="form-label mt-1">Foto</label> <br>
                        <input type="text" name="foto" class="form-control" value="<?= $personaje->foto ?>" required>
                    <? }
                    ?>


                    <label class="form-label mt-2">Cedula</label> <label class="form-label mt-2 text-danger small">*No se puede cambiar*</label>
                    <input type="text" name="cedula" class="form-control" value="<?= $personaje->cedula ?>" required>

                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $personaje->nombre ?>" required>

                    <label class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" value="<?= $personaje->apellido ?>" required>

                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="<?= $personaje->fecha_nacimiento ?>" required>

                    <label class="form-label">Edad</label>
                    <input type="int" name="edad" class="form-control" value="<?= $personaje->edad ?>" required>

                    <label class="form-label">Sexo</label>
                    <select name="sexo" class="form-select" required>
                        <option value="">Seleccione una opcion</option>
                        <option value="Masculino" <?php if (isset($personaje) && $personaje->sexo == 'Masculino') {
                                                        echo "selected";
                                                    }  ?>>Masculino</option>
                        <option value="Femenino" <?php if (isset($personaje) && $personaje->sexo == 'Femenino') {
                                                        echo "selected";
                                                    }  ?>>Femenino</option>
                    </select>

                    <label class="form-label">Comida favorita</label>
                    <input type="text" name="comida_favorita" class="form-control" value="<?= $personaje->comida_favorita ?>" required>

                    <label class="form-label">Habilidades</label>
                    <textarea name="habilidades" class="form-control" required><?= $personaje->habilidades ?></textarea>

                    <div class="mt-3">
                        <button class="btn btn-success" type="submit">Confirmar</button>
                        <button class="btn btn-danger" type="reset">Borrar</button>
                        <a href="personajes.php?codigo=<?= $_GET['codigo'] ?>" class="btn btn-primary">Cancelar</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
include('layout/footer.php');
?>