<?php
include('../../library/layout.php');
plantilla::aplicar();


$jobs = Dbx::tolist("job");
$characters = Dbx::tolist("character");
//obtener cantidad de personajes y profesiones
$jobsquantity = count($jobs);
$charactersquantity = count($characters);

//Obtener Edad promedio
$age_avg = 0;
foreach ($characters as $character) {
    $age_avg += $character->age;
}
$age_avg /= $charactersquantity;

//Obtener salario promedio
$salary_avg = 0;
foreach ($jobs as $job) {
    $salary_avg += $job->salary;
}
$salary_avg /= $jobsquantity;

//Obtener experiencia promedio
$exp_avg = 0;
foreach ($characters as $character) {
    $exp_avg += $character->exp;
}
$exp_avg /= $charactersquantity;

// Contar personajes por profesión
$character_jobs = [];

foreach ($characters as $character) {
    $job = $character->job;

    if (isset($jobCounts[$job])) {
        $jobCounts[$job]++;
    } else {
        $jobCounts[$job] = 1;
    }
}
//Profesión con el salario más alto y la de menor salario.
$max_salary[0] = ["name" => "", "salary" => 0];
$min_salary[0] = ["name" => "", "salary" => 9999999999];

foreach ($jobs as $job) {
    if($max_salary[0]["salary"] < $job -> salary){
        $max_salary[0]["name"] = $job -> name;
        $max_salary[0]["salary"] = $job -> salary;
    }
    if($min_salary[0]["salary"] > $job -> salary){
        $min_salary[0]["name"] = $job -> name;
        $min_salary[0]["salary"] = $job -> salary;
    }
}
//Personaje con el salario más alto.
foreach ($characters as $character) {
    if($character -> job == $max_salary[0]['name']){
        $max_char_salary = $character -> name . " " . $character -> lastname;
    }
}

$salaryByCategory = [];

foreach ($jobs as $job) {
    $category = $job->category;
    
    if (!isset($salaryByCategory[$category])) {
        $salaryByCategory[$category] = [
            'total' => 0,
            'count' => 0
        ];
    }

    $salaryByCategory[$category]['total'] += $job->salary;
    $salaryByCategory[$category]['count'] += 1;
}

// Calcular el salario promedio por categoría
$categories = [];
$averageSalaries = [];

foreach ($salaryByCategory as $category => $data) {
    $categories[] = $category;
    $averageSalaries[] = round($data['total'] / $data['count'], 2);
}


?>
<div class="title2 text-center mb-4 mt-2 mx-auto py-3 shadow">
    <h2 class="text-white ">🌟 Estadisticas del Mundo Barbie 🌟</h2>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Total de personajes</h5>
                    <p class="display-6"><?= $charactersquantity ?></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Total de profesiones</h5>
                    <p class="display-6"><?= $jobsquantity ?></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Edad promedio</h5>
                    <p class="display-6"><?= $age_avg ?></p>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-4 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Salario promedio</h5>
                    <p class="display-6"><?= number_format($salary_avg, 2) ?></p>
                </div>
            </div>
        </div>
        <div class="col-4 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Personje con el salario mas alto</h5>
                    <p class="display-6"><?=$max_char_salary?></p>
                </div>
            </div>
        </div>
        <div class="col-4 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Experiencia promedio</h5>
                    <p class="display-6"><?= number_format($exp_avg, 2) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Personajes x Profesión</h5>
                    <ul>
                        <?php foreach ($jobs as $job):
                            $jobName = $job->name;
                            $count = isset($jobCounts[$jobName]) ? $jobCounts[$jobName] : 0;
                        ?>
                            <li><?= $jobName . ": " . $count ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-4 mx-auto mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Profesiones con mayor y menor Salario</h5>
                    <p>Mayor Salario, <?=$max_salary[0]["name"] . ": {$max_salary[0]["salary"]}"?></p>
                    <p>Menor Salario, <?=$min_salary[0]["name"] . ": {$min_salary[0]["salary"]}"?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="salaryChart" width="400" height="300"></canvas>

<script>
    const ctx = document.getElementById('salaryChart').getContext('2d');
    const salaryChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($categories) ?>,
            datasets: [{
                label: 'Salario promedio por categoría',
                data: <?= json_encode($averageSalaries) ?>,
                backgroundColor: [
                    '#FF69B4', '#FFC0CB', '#FFB6C1', '#F08080',
                    '#DB7093', '#FF1493', '#FF69B4', '#FFA07A'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Salario ($USD)'
                    }
                }
            }
        }
    });
</script>
