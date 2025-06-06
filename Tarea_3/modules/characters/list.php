<?php
include('../../library/layout.php');
plantilla::aplicar();

$characters = Dbx::tolist("character");
?>

<div class="d-flex align-items-center justify-content-center">
    <div class="title2 text-center mt-2 mx-auto  py-3 shadow">
        <h2 class="text-white row-cols-4 ">Listado de Personajes</h2>
    </div>
    <div class="d-block text-end ">
        <a class="barbiebutton mt-3" href="edit.php">Agregar</a>
    </div>
</div>

<div>
    <div class="mt-3 container">
        <div class="row">
            <?php foreach ($characters as $character) { ?>
                <div class="col-4">
                    <div style="background-color: rgb(219, 142, 203); border-radius: 10px;" class="p-3 mb-3">
                        <div class="text-center">
                            <div class="text-white" style="font-family:barbie; font-size: 300%;">
                                <?= htmlspecialchars($character->name . " " . $character->lastname) ?>
                            </div>
                            <img style="height: 175px; border-radius: 8px;" class="m-2" src="<?= $character->img ?>">
                            <div></div>
                            <a href="edit.php?id=<?= $character->id ?>" class="barbiebutton">Editar</a>
                            <a href="delete.php?id=<?= $character->id ?>" class="barbiebutton">Eliminar</a>
                            <a href="details.php?id=<?= $character->id ?>" class="barbiebutton mt-1">Detalles</a>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
</div>