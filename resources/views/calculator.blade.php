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
        border: 1px solid #b3a0d4; /* Couleur plus foncée pour les bordures */
        padding: 20px;
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px, rgba(0, 0, 0, 0.06) 0px 1px 3px;
        background-color: #ffffff; /* Fond blanc pour les cartes */
        width: 60%;
    }

    h1 {
        text-align: center;
        font-weight: bold;
        font-size: 33px;
        font-family: "Roboto", serif;
        text-transform: uppercase;
        color: #4a3c79; /* Couleur foncée et subtile pour le titre */
    }

    form {
        display: flex; /* Active l'affichage en ligne */
        flex-wrap: wrap; /* Permet aux boutons de passer à la ligne si besoin */
        justify-content: center; /* Centrer horizontalement */
        gap: 10px; /* Espacement entre les boutons */
        margin-top: 20px;
    }

    input {
        background-color: #ffffff; /* Fond blanc pour les champs */
        border: 1px solid #b3a0d4; /* Bordure assortie à celle de la carte */
        border-radius: 5px; /* Coins arrondis */
        margin: 5px;
        padding: 10px;
        font-size: 16px;
        width: 100%;
        max-width: 300px;
        color: #4a3c79; /* Texte foncé pour une meilleure lisibilité */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    input:focus {
        outline: none;
        border-color: #7c5fc7; /* Bordure violette au focus */
        box-shadow: 0 0 8px rgba(124, 95, 199, 0.3);
    }

    button {
        background-color: #7c5fc7; /* Violette douce pour les boutons */
        color: #ffffff;
        border: none;
        border-radius: 5px; /* Coins arrondis */
        padding: 8px 12px; /* Padding réduit pour des boutons plus petits */
        font-size: 14px; /* Taille de texte plus petite */
        cursor: pointer;
        transition: all 0.3s;
        width: auto; /* Largeur automatique pour éviter que le bouton ne soit trop large */
        max-width: 120px; /* Largeur maximale des boutons */
    }

    button:hover {
        background-color: #6a47c1; /* Violette un peu plus foncée au survol */
        box-shadow: 0 4px 8px rgba(106, 71, 193, 0.3);
    }

    button:active {
        background-color: #5b3fa0; /* Violette encore plus foncée */
    }

    .button1 {
        background-color: #10b981; /* Vert doux */
    }

    .button1:hover {
        background-color: #059669; /* Vert plus foncé au survol */
    }

    .result-carte {
        margin-top: 10px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 8px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px, rgba(0, 0, 0, 0.06) 0px 1px 3px;
        background-color: #fef2f2; /* Rouge clair */
        color: #b91c1c; /* Rouge foncé pour le texte */
        justify-content: center;
        width: 100%;
        max-width: 300px;
    }

    .result-carte p {
        margin: 5px;
        font-weight: bold;
        text-align: center;
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
