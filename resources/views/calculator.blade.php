<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale1.0">
    <title>Calculatrice</title>
</head>
<body>
<style>
    body{
        font-family: 'Arial', serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .calculateur-container{
        display: flex;
        justify-content: center;
        max-width: 500px;
        width: 100%;
    }

    .calculatrice-carte{
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        width: 60%;
    }

    h1{
        text-align: center;
        font-weight: bold;
        font-size: 33px;
        font-family: "Segoe UI", serif;
        text-transform: uppercase;
    }

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    input{
        background-color: gainsboro;
        margin: 5px;
        padding: 8px;
        font-size: 16px;
    }
    button{
        background-color: burlywood;
        margin: 5px;
        padding: 8px;
        font-size: 16px;
    }

    .button1{
        background-color: greenyellow;
        margin: 5px;
        padding: 8px;
        font-size: 16px;
    }

    .result-carte{
        margin-top: 10px;
        border: 1px solid #ddd;
        padding: 1px;
        margin: 4px;
        border-radius: 8px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        background-color: burlywood;
        justify-content: center;

        p{
            margin: 5px;
        }
    }

</style>




<h1>Calculez vos opérations ici</h1>
<div class="calculateur-container">
    <div class="calculatrice-carte">
        <form action={{route('calculate')}} method="get">
            @csrf
            <input type="text" name="num1" placeholder="Entrer un nombre" required value="{{isset($num1)?$num1: ' '}}">
            <div id="selected-operator">{{isset($operator)? ' '.$operator: ' '}}</div>
            <input type="text" name="num2" placeholder="Entrer le second nombre" required value="{{isset($num2)?$num2: ' '}}">
            <div>
                <button type="button" onclick="setOperator('+')">+</button>
                <button type="button" onclick="setOperator('-')">-</button>
                <button type="button" onclick="setOperator('*')">*</button>
                <button type="button" onclick="setOperator('/')">/</button>
            </div>
            <input type="hidden" name="operator" id="operator" value="">
            <button type="button" class="button1" onclick="submitForm()">Calculer</button>

        </form>
    </div>
</div>
@if(isset($result))
    <div class="result-carte">
        <p>Resultat : {{$result}}</p>
    </div>
@endif


<script>
    function setOperator(operator){
        document.getElementById('selected-operator').innerText = `${operator}`;
        document.getElementById('operator').value = operator;
    }
    function submitForm(){
        document.querySelector('form').submit();
    }

</script>

</body>

</html>