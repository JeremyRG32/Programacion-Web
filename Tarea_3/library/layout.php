<?php
define('BASE_URL', 'http://localhost:2424');

function base_url($path = "")
{
    return BASE_URL . '/' . $path;
}
include('models.php');
include('Dbx.php');
class plantilla
{
    static $instance = null;
    public static function aplicar()
    {
        if (self::$instance == null) {
            self::$instance = new plantilla();
        }
        return self::$instance;
    }

    function __construct()
    {
?>
        <style>
            .title {
                margin-top: 12;
                font-family: barbie;
                font-size: 60;
            }

            .title2 {
                background-color: rgb(239, 44, 174);
                width: 50%;
                border-radius: 15px;
            }

            nav .nav-link {
                color: white;
                text-decoration: none;
                margin-left: 75px;
                font-size: 20;
                font-weight: bold;
            }

            nav .nav-link:hover {
                color: pink;
            }

            .barbietable {
                background-color: rgb(254, 108, 206);
                color: white;
            }

            .barbiebutton {
                border-radius: 13px;
                width: 125px;
                height: 40px;
                background-color: rgb(239, 44, 174);
                border: none;
                color: white;
                font-weight: bold;
                font-size: large;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                line-height: 40px;
            }

            .barbiebutton:hover {
                color: pink;
            }

            .barbieform {
                background-color: pink;
                border-radius: 6px;
                min-height: 500px;
            }

            .info {
                background-color: rgb(219, 142, 203);
                height: 310px;
                border-radius: 10px;
            }

            .info:hover {
                box-shadow: 0 0 2px black;
                color: pink;
            }
            a {
                text-decoration: none !important;
                color: inherit;
            }
        </style>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>El Mundo de Barbie</title>
            <link href="https://fonts.cdnfonts.com/css/barbie" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>

        <body style="background-color: pink;">
            <div style="position: sticky; z-index: 1030; top: 0; height: 95px; background-color: rgb(239, 44, 174);" class="shadow d-flex align-items-center">
                <div style="background-color: white; border-radius: 50%; width: 80px; height: 80px;" class="index d-flex align-items-center mx-4">
                    <img src="/imgs/BarbieLogo.png" style="height:50;">
                </div>
                <h1 class="title mt-4" style="color: white; margin-left: 0;">Barbie</h1>
                <nav style="margin-left: 10rem;" class="nav d-flex mt-2">
                    <a class="nav-link" href="<?= BASE_URL ?>">Inicio</a>
                    <a class="nav-link" href="<?= base_url('modules/characters/list.php') ?>">Personajes</a>
                    <a class="nav-link" href="<?= base_url('modules/jobs/list.php') ?>">Profesiones</a>
                    <a class="nav-link" href="<?= base_url('modules/stats/list.php') ?>">Estadisticas</a>
                </nav>
            </div>
            <div style="background-color: white; min-height: 900px;" class="container shadow overflow-hidden">
        </body>

        </html>
    <?
    }

    function __destruct()
    {
    ?>
        </div>
<?
    }
}
