<?php require('layout/header.php');
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$operacion = $_GET['operacion'];

switch ($operacion) {
    case 'suma':
        $resultado = $num1 + $num2;
        break;
    case 'resta':
        $resultado = $num1 - $num2;
        break;
    case 'multiplicacion':
        $resultado = $num1 * $num2;
        break;
    case 'division':
        if ($num2 != 0) {
            $resultado = $num1 / $num2;
        } else {
            $resultado = "Error: Division por cero";
        }
        break;

    default:
        echo "La operacion no es valida";
        break;
}
if(is_numeric($resultado)){
    $resultado = number_format($resultado, 2);
}
?>

<style>
    .resultado{
        width: 400px;
        margin: 30px auto;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 20px;
        box-shadow: 0 0 2px;
        background-color: rgb(239, 239, 239);
        text-align: center;
        
    }
    #algo2{
        margin: 10px auto;
        padding: 15px;
        background-color: #023877;
        text-align: center;
        font-size: larger;
        font-weight: bold;
        border-radius: 5px;
        border: 1px solid #ccc;
        color: white;
        text-decoration: none;
    }
    #algo{
        margin: 25px;
        font-weight: lighter;
    }

</style>
<div class="resultado">
    <h2>Resultado de la operacion</h2>
    <h3 id="algo">La <?php echo $operacion; ?> entre <?php echo $num1; ?> y <?php echo $num2; ?> es <?php echo $resultado; ?></h3>
    <a href="calculadora.php" id="algo2">Volver a la calculadora</a>
</div>

<?php require('layout/footer.php'); ?>