<?php
include('library/layout.php');
plantilla::apply();

$visit = new visit();

if($_GET){
    $visit = dbx::get("visits", $_GET["cedula"]);
}

if($_POST){
    dbx::delete('visits', $_POST["cedula"]);
}

?>

<div style="background-color: skyblue; border-radius: 14px;" class=" p-2 mt-4 container shadow"> 
    <h2 class="text-center text-white">Eliminar una Visita</h2>
</div>

<div class="mt-3">
    <form action="delete.php" method="post">

    
    <input type="text" hidden name="cedula" value="<?=$visit->cedula?>" class="form-control">

    <label class="form-label">Cedula</label>
    <input type="text" disabled name="cedula" value="<?=$visit->cedula?>" class="form-control">

    <label class="form-label">Nombre</label>
    <input type="text" name="name" disabled value="<?=$visit->name?>" class="form-control">

    <label class="form-label">Apellido</label>
    <input type="text" name="lastname" disabled value="<?=$visit->lastname?>" class="form-control">

    <label class="form-label">Edad</label>
    <input type="number" name="age" disabled value="<?=$visit->age?>" class="form-control">

    <label class="form-label">Motivo de la visita</label>
    <input type="text" name="motive" disabled value="<?=$visit->motive?>" class="form-control">

    <button type="submit" class="mt-2 btn btn-primary">Confirmar</button>
    <a href="visits.php" class="btn btn-danger mt-2">Cancelar</a>
    </form>
</div>