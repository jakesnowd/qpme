<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Cocina y Nutrición</title>
    <link rel="icon" type="image/png" href="imag/logoagu.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(180deg, rgb(84, 240, 170) 0%, rgb(14, 221, 48) 100%);
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }
        .header {
            background-color: #4cff82;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            position: relative;
        }
        .menu {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .menu button {
            background-color: #4cff82;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .menu button:hover {
            background-color: #42e374;
        }
        .menu-content {
            display: none;
            position: absolute;
            background-color: #4cff82;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
        }
        .menu-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .menu-content a:hover {
            background-color: #42e374;
        }
        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .welcome-box, .recipe-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
            max-width: 500px;
            position: relative;
        }
        .welcome-box h2, .recipe-box h2 {
            color: #333;
        }
        .logout-button, #add-recipe, #add-ingredients {
            background-color: #4cff82;
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            transition: background-color 0.3s, transform 0.3s;
        }
        .logout-button:hover, #add-recipe:hover, #add-ingredients:hover {
            background-color: #42e374;
            transform: scale(1.05);
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        li .recipe-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 700;
        }
        li button {
            background-color: #dc3545;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s;
        }
        li button:hover {
            background-color: #c82333;
        }
        .ingredient-input {
            margin-bottom: 10px;
        }
        .ingredient-list {
            padding-left: 20px;
        }
        .ingredient-item {
            font-size: 14px;
            margin-bottom: 5px;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .close-button:hover {
            background-color: #c82333;
        }
        .footer {
            background-color: #4cff82;
            color: white;
            text-align: center;
            padding: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        #calculate-button {
            background-color: #4cff82;
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        #calculate-button:hover {
            background-color: #42e374;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="menu">
            <button id="menu-button">☰</button>
            <div class="menu-content" id="menu-content">
                <a href="#" id="calculate-bmi">Calcular IMC</a>
                <a href="logout.php">Cerrar sesión</a>
            </div>
        </div>
        Cocina y Nutrición
    </header>
    <div class="container">
        <div class="welcome-box">
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
            <p>Has ingresado exitosamente.</p>
        </div>
        <div class="recipe-box">
            <h2>Agregar Nueva Receta</h2>
            <input type="text" id="new-recipe" placeholder="Nombre de la receta">
            <button id="add-recipe">Agregar Receta</button>
            <ul id="recipe-list"></ul>
        </div>
        <div class="recipe-box" id="ingredient-box" style="display:none;">
            <button class="close-button">X</button>
            <h2>Agregar Ingredientes</h2>
            <input type="number" id="ingredient-count" placeholder="Número de ingredientes" min="1">
            <button id="add-ingredients">Añadir Ingredientes</button>
            <div id="ingredient-inputs"></div>
        </div>
    </div>
    <footer class="footer">
        Derechos reservados © 2024 Cocina y Nutrición
    </footer>
    <div id="bmiModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Calcular Índice de Masa Corporal (IMC)</h2>
            <input type="number" id="height" placeholder="Altura en cm">
            <input type="number" id="weight" placeholder="Peso en kg">
            <button id="calculate-button">Calcular</button>
            <p id="bmi-result"></p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#menu-button').click(function() {
                $('#menu-content').toggle();
            });

            $('#add-recipe').click(function() {
                var recipeText = $('#new-recipe').val();
                if (recipeText !== '') {
                    $.ajax({
                        url: 'guardar_receta.php',
                        type: 'POST',
                        data: { receta: recipeText },
                        success: function(response) {
                            var recipeId = response;
                            var recipeItem = $('<li></li>');
                            var recipeTitle = $('<div class="recipe-title"></div>').text(recipeText);
                            var deleteButton = $('<button></button>').text('Eliminar');
                            var saveButton = $('<button></button>').text('Guardar');

                            recipeTitle.append(deleteButton);
                            recipeTitle.append(saveButton);
                            recipeItem.append(recipeTitle);
                            recipeItem.append('<ul class="ingredient-list"></ul>'); // Add an empty ingredient list
                            recipeItem.attr('data-recipe-id', recipeId);

                            deleteButton.click(function() {
                                recipeItem.remove();
                            });

                            saveButton.click(function() {
                                var currentRecipeText = $('#ingredient-box').attr('data-current-recipe');
                                var recipeId = $('#ingredient-box').attr('data-recipe-id');
                                var currentRecipe = $('#recipe-list li:contains("' + currentRecipeText + '")');
                                var ingredientList = currentRecipe.find('.ingredient-list');
                                var ingredientes = [];

                                ingredientList.find('li').each(function() {
                                    var ingredientText = $(this).text();
                                    if (ingredientText !== '') {
                                        ingredientes.push(ingredientText);
                                    }
                                });

                                $.ajax({
                                    url: 'guardar_ingredientes.php',
                                    type: 'POST',
                                    data: { ingredientes: ingredientes, receta_id: recipeId },
                                    success: function(response) {
                                        alert(response);
                                    }
                                });
                            });

                            recipeTitle.click(function() {
                                $('#ingredient-box').show().attr('data-current-recipe', recipeText).attr('data-recipe-id', recipeId);
                            });

                            $('#recipe-list').append(recipeItem);
                            $('#new-recipe').val('');
                        }
                    });
                }
            });

            $('#add-ingredients').click(function() {
                var ingredientCount = $('#ingredient-count').val();
                var ingredientInputs = $('#ingredient-inputs');
                ingredientInputs.empty();

                for (var i = 0; i < ingredientCount; i++) {
                    var input = $('<input type="text" class="ingredient-input" placeholder="Ingrediente ' + (i + 1) + '">');
                    ingredientInputs.append(input);
                }

                ingredientInputs.append('<button id="save-ingredients">Guardar Ingredientes</button>');

                $('#save-ingredients').click(function() {
                    var currentRecipeText = $('#ingredient-box').attr('data-current-recipe');
                    var recipeId = $('#ingredient-box').attr('data-recipe-id');
                    var currentRecipe = $('#recipe-list li:contains("' + currentRecipeText + '")');
                    var ingredientList = currentRecipe.find('.ingredient-list');
                    var ingredientes = [];

                    ingredientInputs.find('input').each(function() {
                        var ingredientText = $(this).val();
                        if (ingredientText !== '') {
                            ingredientes.push(ingredientText);
                            var ingredientItem = $('<li class="ingredient-item"></li>').text(ingredientText);
                            ingredientList.append(ingredientItem);
                        }
                    });

                    $.ajax({
                        url: 'guardar_ingredientes.php',
                        type: 'POST',
                        data: { ingredientes: ingredientes, receta_id: recipeId },
                        success: function(response) {
                            $('#ingredient-box').hide();
                        }
                    });
                });
            });

            $('.close-button').click(function() {
                $('#ingredient-box').hide();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest('#menu-button').length && !$(event.target).closest('#menu-content').length) {
                    $('#menu-content').hide();
                }
            });

            $('#calculate-bmi').click(function() {
                $('#bmiModal').show();
            });

            $('.close').click(function() {
                $('#bmiModal').hide();
            });

            $('#calculate-button').click(function() {
                var height = $('#height').val();
                var weight = $('#weight').val();
                if (height > 0 && weight > 0) {
                    var bmi = (weight / ((height / 100) ** 2)).toFixed(2);
                    var bmiResult = 'Tu IMC es ' + bmi + '. ';
                    if (bmi < 18.5) {
                        bmiResult += 'Tienes bajo peso.';
                    } else if (bmi >= 18.5 && bmi < 24.9) {
                        bmiResult += 'Tienes un peso normal.';
                    } else if (bmi >= 25 && bmi < 29.9) {
                        bmiResult += 'Tienes sobrepeso.';
                    } else {
                        bmiResult += 'Tienes obesidad.';
                    }
                    $('#bmi-result').text(bmiResult);
                } else {
                    $('#bmi-result').text('Por favor, ingrese valores válidos.');
                }
            });

            $(window).click(function(event) {
                if ($(event.target).is('#bmiModal')) {
                    $('#bmiModal').hide();
                }
            });
        });
    </script>
</body>
</html>
