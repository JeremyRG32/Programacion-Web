<?php
include('../../library/layout.php');
plantilla::aplicar();
$character = new character();

$job = new job();
$jobs = dbx::tolist('job');

if (isset($_GET['id'])) {
    $character = Dbx::get('character', $_GET['id']);
    if ($character) {
    }
}

if ($_POST && $_FILES) {
    $filepath = "../../library/datax/character";
    if (!is_dir($filepath . "/imgs")) {
        mkdir($filepath . "/imgs", 0777);
    }
    $imgpath = $filepath . "/imgs/";
    $filename = $_FILES['img']['tmp_name'];
    $originalName = basename($_FILES['img']['name']);
    $destination = $imgpath . $originalName;
    move_uploaded_file($filename, $destination);
    $addcharacter = new character($_POST, $destination);
    Dbx::save('character', $addcharacter);
}
?>


<div class="title2 text-center mt-2 mx-auto  py-3 shadow">
    <h2 class="text-white row-cols-4 "><?= isset($_GET['id']) ? "Editar Personaje" : "Agregar Personaje" ?></h2>
</div>

<div class="barbieform container p-2 mt-4">
    <form method="POST" action="edit.php" enctype="multipart/form-data">

        <?php if (isset($_GET['id'])) {
        ?> <div style="background: none; border: solid 2px white; border-radius: 10px; width: fit-content;" class="container m-2 p-2">
                <img class="mb-2 text-center" style="height: 150px;" src="<?= $character->img ?>">
            </div> <br> <?
                    } ?>

        <label class="form-label mt-2">Foto</label>
        <input class="form-control" type="file" name="img" accept="image/*" value="<?= $character->img ?>">

        <input class="form-control" type="text" name="id" hidden value="<?= htmlspecialchars($character->id) ?>">

        <label class="form-label">Nombre</label>
        <input class="form-control" type="text" name="name" required value="<?= htmlspecialchars($character->name) ?>">

        <label class="form-label">Apellido</label>
        <input class="form-control" type="text" name="lastname" required value="<?= htmlspecialchars($character->lastname) ?>">

        <label class="form-label">Fecha de Nacimiento</label>
        <input class="form-control" type="date" name="birthdate" required value="<?= htmlspecialchars($character->birthdate) ?>">

        <label class="form-label">Edad</label>
        <input class="form-control" type="number" name="age" required value="<?= htmlspecialchars($character->age) ?>">

        <label class="form-label">Profesion</label>
        <select name="job" required class="form-select">
            <?php foreach ($jobs as $job) { ?>
                <option value="<?=$job->name?>" <?= $job->name == $character->job ? "selected" : ""?>>
                    <?=$job->name?>   
                </option>
            <?}?>
        </select>

        <label class="form-label">Nivel de Experiencia</label>
        <input class="form-control" type="number" name="exp" value="<?= htmlspecialchars($character->exp) ?>">

        <div class="mt-3 text-center">
            <button type="submit" class="barbiebutton">Confirmar</button>
            <a class="barbiebutton" href="list.php">Cancelar</a>
        </div>
    </form>
</div>