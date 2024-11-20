<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale1.0">
    <title>Calculatrice</title>
</head>
<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

    body {
        font-family: 'Roboto', serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background-color: #d1c4e9; /* Gris doux avec touche de lavande */
    }

    .calculateur-container {
        display: flex;
        justify-content: center;
        max-width: 500px;
        width: 100%;
    }

    .calculatrice-carte {
        border: 1px solid #b3a0d4; /* Bordure violette douce */
        padding: 20px;
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px, rgba(0, 0, 0, 0.06) 0px 1px 3px;
        background-color: #ffffff;
        width: 60%;
    }

    h1 {
        text-align: center;
        font-weight: bold;
        font-size: 33px;
        font-family: "Roboto", serif;
        text-transform: uppercase;
        color: #4a3c79;
    }

    form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    input {
        background-color: #ffffff;
        border: 1px solid #b3a0d4;
        border-radius: 5px;
        margin: 5px;
        padding: 10px;
        font-size: 16px;
        width: 100%;
        max-width: 300px;
        color: #4a3c79;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    input:focus {
        outline: none;
        border-color: #7c5fc7;
        box-shadow: 0 0 8px rgba(124, 95, 199, 0.3);
    }

    button {
        background-color: #7c5fc7;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 8px 12px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        width: auto;
        max-width: 120px;
    }

    button:hover {
        background-color: #6a47c1;
        box-shadow: 0 4px 8px rgba(106, 71, 193, 0.3);
    }

    button:active {
        background-color: #5b3fa0;
    }

    .button1 {
        background-color: #10b981;
    }

    .button1:hover {
        background-color: #059669;
    }

    .result-carte {
        margin-top: 20px;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 12px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px, rgba(0, 0, 0, 0.06) 0px 1px 3px;
        background-color: #ffffff;
        width: 100%;
        max-width: 400px;
        text-align: center;
        transition: all 0.3s;
    }

    .result-carte p {
        margin: 10px 0;
        font-size: 20px;
        font-weight: bold;
        color: #4a3c79;
    }

    .result-carte.erreur {
        background-color: #f8d7da; /* Rouge clair pour les erreurs */
        border-color: #f5c6cb;
        color: #721c24; /* Rouge foncé pour le texte d'erreur */
    }

    .result-carte.succes {
        background-color: #d4edda; /* Vert clair pour les résultats positifs */
        border-color: #c3e6cb;
        color: #155724; /* Vert foncé pour le texte */
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
                <button type="button" onclick="setOperator('^2')">^2</button>
                <button type="button" onclick="setOperator('sin')">sin</button>
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
