<?php
require('layout/header.php'); ?>

<style>
#calculadora {
    width: 400px;
    margin: 30px auto;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 20px; 
    box-shadow: 0 0 2px;    
    background-color: rgb(239, 239, 239);
    text-align: center;
}

.inputs{
    margin: 10px;
}
.inputs label{
    font-family:Arial, Helvetica, sans-serif;   
}
.inputs input{
    padding: 5px;
    border-radius: 3px;
    border: 1px solid #ccc;
}
.inputs select{
    border: 1px solid #ccc;
    text-align: center;
    padding: 5px;
    border-radius: 3px;
}
.inputs button{
   border: 1px solid #ccc;
   background-color: #023877;
   width: 100%;
   padding: 10px;
   border-radius: 10px;
   color: white;
   font-size: larger;
   font-weight: bold;
}
</style>


<div id="calculadora">
    <form method="GET" action="resultado.php">
        <h2 style="text-align: center;">Esta es mi Calculadora</h2>
        <div class="inputs">
            <label>Num1</label>
            <input type="number" name="num1" id="num1" required placeholder="Ingrese un numero" />
        </div>
        <div class="inputs">
            <label>Num2</label>
            <input type="number" name="num2" id="num2" required placeholder="Ingrese un numero" />
        </div>
        <div class="inputs">
            <label>Operación</label>
            <select name="operacion" id="operacion">
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select>
        </div>
        <div class="inputs">
            <button type="submit">Calcular</button>
        </div>
    </form>
</div>
<?php require('layout/footer.php'); ?>