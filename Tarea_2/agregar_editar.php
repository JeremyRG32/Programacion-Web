   <?php
    include('layout/header.php');
    $obra = new obra();
    if (isset($_GET['codigo'])) {

        if (is_file('datos/' . $_GET['codigo'] . '.json')) {
            $json = file_get_contents('datos/' . $_GET['codigo'] . '.json');
            $obra = json_decode($json);
        }
    } else {
    }

    if ($_POST) {
        $obra->codigo = $_POST['codigo'];
        $obra->foto = $_POST['foto'];
        $obra->tipo = $_POST['tipo'];
        $obra->titulo = $_POST['titulo'];
        $obra->pais = $_POST['pais'];
        $obra->autor = $_POST['autor'];
        $obra->descripcion = $_POST['descripcion'];

        if (!is_dir('datos')) {
            mkdir('datos');
        }
        if (!is_dir('datos')) {
            echo "Error al crear el directorio";
        }

        $ruta = 'datos/' . $obra->codigo . '.json';
        $json = json_encode($obra);
        file_put_contents($ruta, $json);

        
        echo "<div class='alert-success container rounded text-center p-3 w-25'>Obra guardada</div>";
        echo "<a href='index.php' class='btn btn-primary container mt-3'>Volver</a>";
        exit();
    }
    ?>
   <style>
       input {
           margin-top: 10px;
       }
   </style>
   <h3 class="mx-1" style="font-weight: bold;">Agregar/Editar una serie</h3>
   <div class="container shadow p-3" style="border-radius: 10px;"> 
       <form action="agregar_editar.php" method="post">
           <label class="form-label" for="codigo">Codigo</label>
           <input class="form-control" type="text" name="codigo" value="<?= $obra -> codigo ?>" required>

           <label class="form-label" for="foto">FotoURL</label>
           <input class="form-control" type="text" name="foto" value="<?= $obra -> foto ?>" required>

           <label class="form-label" for="tipo">Tipo</label>
           <select class="form-select" name="tipo" option value="<?= $obra -> tipo ?>" required>
               <option value="">Seleccione un tipo</option>
               <option value="Pelicula" <?php if (isset($obra) && $obra -> tipo == 'Pelicula') {echo "selected";}  ?>>Pelicula</option>
               <option value="Serie" <?php if (isset($obra) && $obra -> tipo == 'Serie') {echo "selected";}  ?>>Serie</option>
           </select>

           <label class="form-label" for="titulo">Titulo</label>
           <input class="form-control" type="text" name="titulo" value="<?= $obra -> titulo ?>" required>

           <label class="form-label" for="pais">País</label>
           <input class="form-control" type="text" name="pais" value="<?= $obra -> pais ?>" required>

           <label class="form-label" for="autor">Autor</label>
           <input class="form-control" type="text" name="autor" value="<?= $obra -> autor ?>" required>

           <label class="form-label" for="descripcion">Descripcion</label>
           <textarea class="form-control" name="descripcion" required><?=$obra->descripcion?></textarea>

           <div class="mt-3">
               <button class="btn btn-success" type="submit">Confirmar</button>
               <button class="btn btn-danger" type="reset">Borrar Todo</button>
                <a href="index.php" class="btn btn-primary">Cancelar</a>
           </div>
       </form>

   </div>

   <?php
    include('layout/footer.php')
    ?>