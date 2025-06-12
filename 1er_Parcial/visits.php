<?php
include('library/layout.php');
$visits = dbx::tolist('visits');
plantilla::apply();
?>

<div style="background-color: skyblue; border-radius: 14px;" class=" p-2 mt-4 container shadow"> 
    <h2 class="text-center text-white">Lista de Visitas</h2>
</div>

<div>
    <div class="d-flex justify-content-end">
        <a href="edit.php" class="mt-3 btn btn-success">Agregar</a>
    </div>
    <table class="mt-1 table table-bordered table-striped">
        <thead>
            <tr class="table-primary">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula</th>
                <th>Edad</th>
                <th>Motivo</th>
                <th>Fecha y hora</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        foreach ($visits as $v) {?>
        <tbody>
            <tr>
                <td><?=$v->name?></td>
                <td><?=$v->lastname?></td>
                <td><?=$v->cedula?></td>
                <td><?=$v->age?></td>
                <td><?=$v->motive?></td>
                <td><?=$v->date?></td>
                <td class="justify-content-center d-flex">
                    <a class="btn btn-success mx-2 " href="edit.php?cedula=<?=$v->cedula?>">Editar</a>
                    <a class="btn btn-danger " href="delete.php?cedula=<?=$v->cedula?>">Eliminar</a>
                </td>
            </tr>
        </tbody>
        <?}
        ?>
        
    </table>
</div>
