<?php
include('../../library/layout.php');
plantilla::aplicar();
$job = new job;

if (isset($_GET['id'])) {
    $job = Dbx::get('job', $_GET['id']);
    if ($job) {
    }
}

if($_POST){
    $addjob = new job($_POST);
    Dbx::save('job', $addjob);
}
?>


<div class="title2 text-center mt-2 mx-auto  py-3 shadow">
    <h2 class="text-white row-cols-4 "><?= isset($_GET['id']) ? "Editar Profesion" : "Agregar Profesion" ?></h2>
</div>

<div class="barbieform container p-2 mt-4">
    <form method="POST" action="edit.php">
        <input class="form-control" type="text" name="id" hidden value="<?=htmlspecialchars($job->id)?>">
        
        <label class="form-label">Nombre</label>
        <input class="form-control" type="text" name="name" value="<?=htmlspecialchars($job->name)?>">

        <label class="form-label">Categoria</label>
        <input class="form-control" type="text" name="category" value="<?=htmlspecialchars($job->category)?>">

        <label class="form-label">Salario</label>
        <input class="form-control" type="number" name="salary" value="<?=htmlspecialchars($job->salary)?>">

        <div class="mt-3 text-center">
            <button type="submit" class="barbiebutton">Confirmar</button>
            <a class="barbiebutton" href="list.php">Cancelar</a>
        </div>
    </form>
</div>