<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device=width, initial-scale1.0">
        <title>Calculatrice</title>
    </head>
    <body>
        <h1>Calculez vos opérations ici</h1>
        <div class="calculateur -container">
            <div class="calculatrice-carte">
                <form action={{route('calcul')}} method="get">
                    @csrf
                    <input type="text" name="num1" placeholder="Entrer un nombre" required value="{{isset($num1)?$num1: ' '}}">
                    <div id="operateur-selectionne">{{isset($operateur)? ' '.$operateur: ' '}}</div>
                    <input type="text" name="num2" placeholder="Entrer le second nombre" required value="{{isset($num2)?$num2: ' '}}">
                    <div>
                        <button type="button" onclick="setOperateur('+')">+</button>
                        <button type="button" onclick="setOperateur('-')">-</button>
                        <button type="button" onclick="setOperateur('*')">*</button>
                        <button type="button" onclick="setOperateur('/')">/</button>
                    </div>
                    <input type="hidden" name="operateur" id="operateur" value="">
                    <button type="button" class="button" onclick="submitForm">Calculer</button>

                </form>
            </div>
        </div>

    </body>

</html>
