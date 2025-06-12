<?php
include('library/layout.php');
plantilla::apply();

$visit = new visit();

if($_GET){
    $visit = dbx::get("visits", $_GET["cedula"]);
}

if($_POST){
    $visit = new visit($_POST);
    dbx::save('visits', $visit);
}

?>

<div style="background-color: skyblue; border-radius: 14px;" class=" p-2 mt-4 container shadow"> 
    <h2 class="text-center text-white">Agregar una Visita</h2>
</div>

<div class="mt-3">
    <form action="edit.php" method="post">

    
    <input type="text" <?= ($_GET) ? "hidden" : "hidden disabled" ?> name="cedula" value="<?=$visit->cedula?>" class="form-control">

    <label class="form-label <?= ($_GET) ? "text-danger" : "" ?>">Cédula <?= ($_GET) ? "*no se pude editar*" : "" ?></label>
    <input type="text" <?= ($_GET) ? "disabled" : "" ?> name="cedula" value="<?=$visit->cedula?>" class="form-control">

    <label class="form-label">Nombre</label>
    <input type="text" name="name" value="<?=$visit->name?>" class="form-control">

    <label class="form-label">Apellido</label>
    <input type="text" name="lastname" value="<?=$visit->lastname?>" class="form-control">

    <label class="form-label">Edad</label>
    <input type="number" name="age" value="<?=$visit->age?>" class="form-control">

    <label class="form-label">Motivo de la visita</label>
    <input type="text" name="motive" value="<?=$visit->motive?>" class="form-control">

    <label <?= ($_GET) ? "" : "hidden" ?> class="form-label">Fecha y Hora no se pueden cambiar </label> <br>
    <input type="text" hidden name="date" value="<?=$visit->date?>" class="form-control">

    <button type="submit" class="mt-2 btn btn-primary">Confirmar</button>
    <a href="visits.php" class="btn btn-danger mt-2">Cancelar</a>
    </form>
</div>