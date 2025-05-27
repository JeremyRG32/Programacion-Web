 <?php
    include('layout/header.php');
    $obra = new obra();
    if (isset($_GET['codigo'])) {

        if (is_file('datos/' . $_GET['codigo'] . '.json')) {
            $json = file_get_contents('datos/' . $_GET['codigo'] . '.json');
            $obra = json_decode($json);
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $codigo = $_GET['codigo'];
        $archivo = 'datos/' . $codigo . '.json';

        if (is_file($archivo)) {
            unlink($archivo);
        ?>
         <div class='alert-success container rounded text-center p-3 w-25'>Obra Eliminada</div>
         <a href='index.php' class='btn btn-primary container mt-3'>Volver</a>

        <?
            exit();
        }
    }
    ?>
 <style>
     input {
         margin-top: 10px;
     }
 </style>
 <h3 class="mx-1" style="font-weight: bold;">Esta seguro que desea eliminar esta obra</h3>
 <div class="container shadow p-3" style="border-radius: 10px;">
     <form action="eliminar_obra.php?codigo=<?= $_GET['codigo'] ?>" method="POST">
         <label class="form-label" for="foto">Foto</label> <br>
         <img style="height: 200px;" src="<?= $obra->foto ?>"> <br>

         <label class="form-label mt-2" for="codigo">Codigo</label>
         <input class="form-control" type="text" name="codigo" value="<?= $obra->codigo ?>" required disabled>

         <label class="form-label" for="tipo">Tipo</label>
         <select class="form-select" name="tipo" option value="<?= $obra->tipo ?>" required disabled>
             <option value="">Seleccione un tipo</option>
             <option value="Pelicula" <?php if (isset($obra) && $obra->tipo == 'Pelicula') {
                                            echo "selected";
                                        }  ?>>Pelicula</option>
             <option value="Serie" <?php if (isset($obra) && $obra->tipo == 'Serie') {
                                        echo "selected";
                                    }  ?>>Serie</option>
         </select>

         <label class="form-label" for="titulo">Titulo</label>
         <input class="form-control" type="text" name="titulo" value="<?= $obra->titulo ?>" required disabled>

         <label class="form-label" for="pais">País</label>
         <input class="form-control" type="text" name="pais" value="<?= $obra->pais ?>" required disabled>

         <label class="form-label" for="autor">Autor</label>
         <input class="form-control" type="text" name="autor" value="<?= $obra->autor ?>" required disabled>

         <label class="form-label" for="descripcion">Descripcion</label>
         <textarea class="form-control" name="descripcion" required disabled><?= $obra->descripcion ?></textarea>

         <div class="mt-3">
             <button class="btn btn-danger" type="submit">Eliminar</button>
             <a href="index.php" class="btn btn-primary">Cancelar</a>
         </div>
     </form>

 </div>

 <?php
    include('layout/footer.php')
    ?>