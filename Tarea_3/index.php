<?php
include('library/layout.php');
plantilla::aplicar();
?>
<div class="title2 text-center mt-2 mx-auto py-3 shadow">
    <h2 class="text-white">🌟 Bienvenid@ al Mundo Barbie 🌟</h2>
</div>


<div class="text-center">
    <img style="height: 200px;" src="imgs/Barbie.png">
</div>

<div class="mt-3 container">
    <div style="background-color: rgb(219, 142, 203); height: 120px; border-radius: 10px;" class=" info text-center text-white p-3 mb-3">
        <h2>Esta es una app de gestion del mundo barbie que permite realizar las siguientes funciones.</h2>
    </div>
</div>


<div class="mt-3 container text-center text-white p-2">
    <div class="row">
        <div class="col-4">
            <a style="color: white;" href="<?= base_url('modules/characters/list.php') ?>">
                <div class="info mb-3 p-2">
                    <h2>💃🏻<br> Registro de Personajes</h2>
                    <p>
                        Registra a todos los personajes del universo Barbie con sus datos personales.
                        Cada personaje puede tener una profesión, una foto, su nivel de experiencia y más.
                        Este módulo permite construir el catálogo completo de personajes y celebridades del mundo Barbie,
                        permitiendo una personalización total.
                    </p>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a style="color: white;" href="<?= base_url('modules/jobs/list.php') ?>">

                <div class="info mb-3 p-2">
                    <h2>💼<br> Registro de Profesiones y Salarios</h2>
                    <p>
                        Crea profesiones personalizadas y asígnalas a los personajes. Cada profesión incluye una categoría
                        (como Ciencia, Arte o Entretenimiento) y un salario mensual estimado en dólares.
                        Este módulo te permite conocer a qué se dedican tus personajes y
                        cuánto ganan en sus roles dentro del universo Barbie.
                    </p>
                </div>

            </a>
        </div>
        <div class="col-4">
            <a style="color: white;" href="<?= base_url('modules/stats/list.php') ?>">
                <div class="info mb-3 p-2">
                    <h2>📊<br> Panel de Estadísticas (Dashboard)</h2>
                    <p>
                        Accede a un panel visual con gráficos y datos clave sobre los personajes y sus profesiones. Descubre la edad promedio,
                        la profesión mejor pagada, el nivel de experiencia más común, y mucho más. Ideal para tomar decisiones o
                        simplemente disfrutar de ver cómo evoluciona el mundo Barbie con cada personaje que registras.
                    </p>

                </div>
            </a>
        </div>
    </div>
</div>

