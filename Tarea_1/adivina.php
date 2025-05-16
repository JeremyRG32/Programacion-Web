<?php require('layout/header.php'); ?>

<style>
    .title {
        text-align: center;
        width: 400px;
        margin: 30px auto;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #ccc;
        box-shadow: 0 0 2px;
        background-color: rgb(239, 239, 239);
    }

    input {
        text-align: center;
        width: 150px;
        margin: auto;
    }

    button {
        padding: 5px;
        color: white;
        width: 150px;
        border: none;
        background-color: #023877;
        margin: 5px auto;

    }
</style>
<div class="title">
    <h3>Adivina el numero del 1 al 5</h3>
    <div>
        <form method="get" action="">
            <input type="number" name="guess" required placeholder="Ingrese el numero" min="1" max="5"
                value="<?php if (isset($_GET['guess'])) echo $_GET['guess']; ?>"> <br>

            <button type="submit">Enviar</button>
        </form>
    </div>
</div>

<?php
if (isset($_GET['guess'])){
    $numero = $_GET['guess'];
    $aleatorio = rand(1,5);
    if ($numero == $aleatorio){
        echo "<h3>¡Wow, adivinaste!</h3>";
    } else {
        echo "<h3>Perdiste el Numero era: $aleatorio</h3>";
    }
}
?>

<?php require('layout/footer.php'); ?>