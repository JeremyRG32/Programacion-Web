<?php
define("DATA_DIR", __DIR__ . "/datax");
if (!is_dir(DATA_DIR)) {
    mkdir(DATA_DIR, 0777, true);
}

class Dbx
{

    public static function tolist($collection)
    {

        $datapath = DATA_DIR . "/{$collection}";

        if (!is_dir($datapath)) {
            return [];
        }
        $files = scandir($datapath);
        $data = [];

        foreach ($files as $file) {

            $filepath = $datapath . '/' . $file;

            if (!is_file($filepath)) {
                continue;
            }
            if (is_file($filepath)) {
                $content = file_get_contents($filepath);
                $itemdata = unserialize($content);

                if ($itemdata) {
                    $data[] = $itemdata;
                }
            }
        }
        return $data;
    }
    public static function get($collection, $id)
    {
        $datapath = DATA_DIR . "/{$collection}/{$id}.dat";
        if (!is_file($datapath)) {
            return null;
        } else {
            $content = file_get_contents($datapath);
            $content = unserialize($content);
            return $content;
        }
    }
    public static function save($collection, $item)
    {
        $datapath = DATA_DIR . "/{$collection}";
        if (!is_dir($datapath)) {
            mkdir($datapath, 0777, true);
        }
        $files = scandir($datapath);
        foreach ($files as $file) {
            if ($item->id . ".dat" == $file) {
                $filepath = $datapath . "/{$item->id}.dat";
                file_put_contents($filepath, serialize($item));
                echo '<div 
                        style="border-radius: 25px; background-color: pink;" class="text-white alert text-center"><h5>Editado Correctamente</h5><br>
                        <a href="list.php" class="barbiebutton ">Aceptar</a>
                    </div>';
                exit;
            }
        }
        $filename = uniqid();
        $item->id = $filename;
        $filepath = $datapath . "/{$filename}.dat";
        file_put_contents($filepath, serialize($item));
          echo '<div 
                        style="border-radius: 25px; background-color: pink;" class="text-white alert text-center"><h5>Creado Correctamente</h5><br>
                        <a href="list.php" class="barbiebutton ">Aceptar</a>
                    </div>';
                    exit;
    }
    public static function delete($collection, $id)
    {
        $filepath = DATA_DIR . "/{$collection}/{$id}.dat";
        if (!is_file($filepath)) {
            return null;
        } else {
            unlink($filepath);
            echo '<div 
                        style="border-radius: 25px; background-color: pink;" class="text-white alert text-center"><h5>Eliminado Correctamente</h5><br>
                        <a href="list.php" class="barbiebutton ">Aceptar</a>
                    </div>';
                    exit;
        }
    }
}
