<?php
include('../../library/layout.php');
plantilla::aplicar();

$jobs = Dbx::tolist("job");
?>

<div class="d-flex align-items-center justify-content-center">
    <div class="title2 text-center mt-2 mx-auto  py-3 shadow">
        <h2 class="text-white row-cols-4 ">Listado de Profesiones</h2>
    </div>
    <div class="d-block text-end ">
        <a class="barbiebutton mt-3" href="edit.php">Agregar</a>
    </div>
</div>



<div>
    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr class="barbietable text-center">
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job) { ?>

                <tr class="text-center">
                    <td style="width: 200px;"><?= htmlspecialchars($job->name) ?></td>
                    <td style="width: 200px;"><?= htmlspecialchars($job->category) ?></td>
                    <td style="width: 200px;"><?= htmlspecialchars(number_format($job->salary, 2)) ?></td>
                    <td style="width: 270px;">
                        <a href="edit.php?id=<?= $job->id ?>" class="barbiebutton">Editar</a>
                        <a href="delete.php?id=<?= $job->id ?>" class="barbiebutton">Eliminar</a>
                    </td>
                </tr>
                <?
            }
                ?>
        </tbody>
    </table>
</div>