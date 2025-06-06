<?php
include('../../library/layout.php');
plantilla::aplicar();
$character = new character();

if (isset($_GET['id'])) {
    $character = Dbx::get('character', $_GET['id']);
}

if($_POST){
    Dbx::delete('character', $_POST['id']);
}
?>


<div class="title2 text-center mt-2 mx-auto  py-3 shadow">
    <h2 class="text-white row-cols-4 ">Esta seguro que desea eliminar este Personaje</h2>
</div>

<div class="barbieform container p-2 mt-4">
    <form method="POST" action="delete.php">
        <input class="form-control" type="text" name="id" hidden value="<?=htmlspecialchars($character->id)?>">
        
        <?php if (isset($_GET['id'])) {
        ?> <div style="background: none; border: solid 2px white; border-radius: 10px; width: fit-content;" class="container m-2 p-2">
                <img class="mb-2 text-center" style="height: 150px;" src="<?= $character->img ?>">
            </div> <br> <?
                    } ?>

        <label class="form-label">Nombre</label>
        <input class="form-control" type="text" name="name" disabled value="<?=htmlspecialchars($character->name)?>">

        <label class="form-label">Apellido</label>
        <input class="form-control" type="text" name="lastname" disabled value="<?=htmlspecialchars($character->lastname)?>">

        <label class="form-label">Fecha de Nacimiento</label>
        <input class="form-control" type="date" name="birthdate" disabled value="<?=htmlspecialchars($character->birthdate)?>">

        <label class="form-label">Edad</label>
        <input class="form-control" type="number" name="age" disabled value="<?= htmlspecialchars($character->age) ?>">

        <label class="form-label">Profesion</label>
        <input class="form-control" type="text" name="job" disabled value=" <?=htmlspecialchars($character->job)?>">

        <label class="form-label">Nivel de Experiencia</label>
        <input class="form-control" type="number" name="exp" disabled value="<?=htmlspecialchars($character->exp)?>">

        <div class="mt-3 text-center">
            <button type="submit" class="barbiebutton">Confirmar</button>
            <a class="barbiebutton" href="list.php">Cancelar</a>
        </div>
    </form>
</div>