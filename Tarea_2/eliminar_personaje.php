 <?php
    include('layout/header.php');
    $obra = new obra();
    if (isset($_GET['codigo'])) {

        if (is_file('datos/' . $_GET['codigo'] . '.json')) {
            $json = file_get_contents('datos/' . $_GET['codigo'] . '.json');
            $obra = json_decode($json);
        }
    }
    if (isset($_GET['cedula'])) {
        $personaje = new Personaje();
        foreach ($obra->personajes as $p) {
            if ($p->cedula == $_GET['cedula']) {
                $cedula = $p->cedula;
                $personaje = $p;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigo = $_GET['codigo'];
        $archivo = 'datos/' . $codigo . '.json';

        $obra->personajes = array_filter($obra->personajes, function ($p) use ($cedula) {
            return $p->cedula != $cedula;
        });
        file_put_contents($archivo, json_encode($obra));

    ?>
     <div class='alert-success container rounded text-center p-3 w-25'>Personaje Eliminado</div>
     <a href='index.php' class='btn btn-primary container mt-3'>Volver</a>

 <?php
        exit();
    }
    ?>
 <style>
     input {
         margin-top: 10px;
     }
 </style>
 <h3 class="mx-1" style="font-weight: bold;">Esta seguro que desea eliminar este personaje</h3>
 <div class="row">
     <form action="eliminar_personaje.php?codigo=<?= $_GET['codigo'] ?>&cedula=<?= $_GET['cedula'] ?>" method="POST">

         <label class="form-label">Foto</label> <br>
         <img class="mb-3" style="height: 200px; border-radius: 10px;" src="<?= $personaje->foto ?>"> <br>


         <label class="form-label">Cedula</label>
         <input type="text" name="cedula" class="form-control" value="<?= $personaje->cedula ?>" disabled required>

         <label class="form-label">Nombre</label>
         <input type="text" name="nombre" class="form-control" value="<?= $personaje->nombre ?>" disabled required>

         <label class="form-label">Apellido</label>
         <input type="text" name="apellido" class="form-control" value="<?= $personaje->apellido ?>" disabled required>

         <label class="form-label">Fecha de nacimiento</label>
         <input type="date" name="fecha_nacimiento" class="form-control" value="<?= $personaje->fecha_nacimiento ?>" disabled required>

         <label class="form-label">Edad</label>
         <input type="date" name="edad" class="form-control" value="<?= $personaje->edad ?>" disabled required>


         <label class="form-label">Sexo</label>
         <select name="sexo" class="form-select" disabled required>
             <option value="">Seleccione una opcion</option>
             <option value="Masculino" <?php if (isset($personaje) && $personaje->sexo == 'Masculino') {
                                            echo "selected";
                                        }  ?>>Masculino</option>
             <option value="Femenino" <?php if (isset($personaje) && $personaje->sexo == 'Femenino') {
                                            echo "selected";
                                        }  ?>>Femenino</option>
         </select>

         <label class="form-label">Comida favorita</label>
         <input type="text" name="comida_favorita" class="form-control" value="<?= $personaje->comida_favorita ?>" disabled required>

         <label class="form-label">Habilidades</label>
         <textarea name="habilidades" class="form-control" disabled required><?= $personaje->habilidades ?></textarea>

         <div class="mt-3">
             <button class="btn btn-success" type="submit">Confirmar</button>
             <button class="btn btn-danger" type="reset">Borrar</button>
             <a href="personajes.php?codigo=<?= $_GET['codigo'] ?>" class="btn btn-primary">Cancelar</a>
         </div>
     </form>
 </div>
 <?php
    include('layout/footer.php')
    ?>