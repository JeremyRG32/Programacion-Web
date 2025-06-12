<?php

class dbx{

    public static function save($collection, $object){
        if(!is_dir(__DIR__ . '/data')){
            mkdir(__DIR__ . '/data');
        }
        $path = __DIR__ . "/data/{$collection}";
        if(!is_dir($path)){
            mkdir($path);
        }

        $filename = $object->cedula;
        file_put_contents($path . "/{$filename}.dat", serialize($object));

        echo '<div 
                        style="border-radius: 25px; background-color: skyblue;" class="text-white alert text-center mt-4"><h5>Creado/Editado Correctamente</h5><br>
                        <a href="visits.php" class=" mt-3 btn btn-success">Aceptar</a>
                    </div>';
        exit;
    }

    public static function tolist($collection){
        $path = __DIR__ . "/data/{$collection}";

        if(!is_dir($path)){
            return null;
        }
        $list = [];
        $files = scandir($path);
        foreach ($files as $f) {
            if (is_file($path . "/{$f}")){
                $object = file_get_contents($path . "/{$f}");
                $list[] = unserialize($object);
            }
        }
        return $list;
    }

    public static function get($collection, $cedula){
        $path = __DIR__ . "/data/{$collection}";

        $files = scandir($path);
        foreach ($files as $f) {
            if ($f == $cedula .".dat"){
                $object = file_get_contents($path . "/{$f}");
                $object = unserialize($object);
            }
        }
        return $object;
    }

    public static function delete($collection, $cedula){
        $path = __DIR__ . "/data/{$collection}";

        $files = scandir($path);
        foreach ($files as $f) {
            if ($f == $cedula . '.dat'){
                unlink($path . "/{$f}");
                //Hecho por Jeremy Reyes Matricula: 2024-0224 hice un chivo para ese echo
                echo '<div 
                        style="border-radius: 25px; background-color: skyblue;" class="text-white alert text-center mt-4"><h5>Eliminado Correctamente</h5><br>
                        <a href="visits.php" class=" mt-3 btn btn-success">Aceptar</a>
                    </div>';
                exit;
            }
        }
    }
}

?>