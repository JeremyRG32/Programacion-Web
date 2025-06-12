<?php
include('modelos.php');
include('dbx.php');
class plantilla{
    static $instance;
    public static function apply(){
        if(self::$instance == null){
            self::$instance = new plantilla();
        }
        return self::$instance;
    }

    function __construct()
    {?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <title>Document</title>
        </head>
        <body style="background-color: skyblue;">
                <div class="container shadow" style="position: sticky; top: 0; background-color: rgb(24, 147, 255);">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <img style="height: 90px;" src="/imgs/Odontologia.png">
                            <h2 class="text-white">Odontologia</h2>
                        </div>

                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <nav class="nav">
                                <a href="index.php" style="font-size: 20px;" class="nav-link text-white">Inicio</a>
                                <a href="visits.php" style="font-size: 20px;" class="nav-link text-white">Visitas</a>
                            </nav>
                        </div>
                    </div>
                </div>

            <div style="background-color: white; min-height: 1000px;" class="container shadow overflow-hidden">

        </body>
        </html>
  <?}

  function __destruct()
  {?>
    </div>
  <?}
}
?>