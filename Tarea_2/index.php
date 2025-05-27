            <?php
            include('layout/header.php');

            ?>
            <div class="text-end mb-2 ">
                <a href="agregar_editar.php" class="btn btn-success"><i></i>Agregar</a>
            </div>
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead>
                    <tr class="table-primary text-center">
                        <th>Foto</th>
                        <th>Codigo</th>
                        <th>Titulo</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        <th>Personajes</th>
                        <th>Pais</th>
                        <th>Autor</th>
                        <th class="w-25">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $archivos = scandir('datos');
                    foreach ($archivos as $archivo) {

                        if (is_file('datos/' . $archivo)) {
                            $json = file_get_contents('datos/' . $archivo);
                            $obra = json_decode($json);
                    ?>
                            <tr>
                                <td> <img height="125px" class="mx-auto d-block rounded-3" src="<?= $obra->foto ?>"></td>
                                <td><? echo $obra->codigo ?></td>
                                <td><? echo $obra->titulo ?></td>
                                <td><? echo $obra->tipo ?></td>
                                <td><? echo $obra->descripcion ?></td>
                                <td><? echo count($obra->personajes); ?></td>
                                <td><? echo $obra->pais ?></td>
                                <td><? echo $obra->autor ?></td>
                                <td>
                                    <a href="agregar_editar.php?codigo=<?= $obra->codigo ?>" class="btn btn-warning mx-auto w-100">Editar</a>
                                    <a href="detalle.php?codigo=<?= $obra->codigo ?>" class="btn btn-primary mx-auto w-100">Detalles</a>
                                    <a href="personajes.php?codigo=<?= $obra->codigo ?>" class="btn btn-info mx-auto w-100">Personajes</a>
                                    <a href="eliminar_obra.php?codigo=<?= $obra->codigo ?>" class="btn btn-danger mx-auto w-100">Eliminar</a>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php include 'layout/footer.php'; ?>
            </div>
            </div>
            </body>
            </html>