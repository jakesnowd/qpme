<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocina y Nutrición</title>
    <link rel="icon" type="image/png" href="imag/logoagu.png">
    <style>
        body {
            background: linear-gradient(180deg, rgb(84, 240, 170) 0%, rgb(14, 221, 48) 100%);
            margin: 20px;
            padding: 20px;
        }
        h1 {
            color: rgb(44, 6, 1);
            text-align: center;
            margin-top: 0;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 50px;
            padding: 50px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .section {
            background-color: rgba(105, 241, 100, 0.73);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .section img {
            max-width: 100%;
            display: block;
            margin: 0 auto;
        }
        .section h2 {
            text-align: center;
        }
        .section a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        .form-section {
            background-color: rgba(157, 244, 154, 0.73);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .form-section h2 {
            text-align: center;
        }
        .form-section form {
            text-align: center;
        }
        footer {
            grid-column: 1 / -1;
            text-align: center;
            margin-top: 20px;
        }
        hr {
            background-color: rgb(242, 236, 236);
        }
        .menu {
            display: block;
            text-align: center;
        }
        .menu > ul {
            display: inline-block;
            padding: 0;
            margin: 0;
        }
        .menu > ul > li {
            display: inline;
            list-style: none;
            padding: 15px;
            border-radius: 20px;
        }
        .menu > ul > li > a {
            text-decoration: none;
            color: white;
        }
        .menu > ul > li > a:hover {
            color: #420606;
            padding: 15px;
            height: 25px;
            background-color: #71f668;
            border-radius: 25px;
        }
        nav {
            background-color: #55f375;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        nav > ul {
            list-style-type: none;
            margin: 0;
        }
        nav > ul > li {
            display: inline;
        }
        nav > ul > li > a {
            color: #fff;
            text-decoration: none;
        }
        .btn {
            background-color: #4cff82;
            padding: 8px 25px;
            border: 0;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            border-radius: 25px;
            color: #ffffff;
            cursor: pointer;
            font-size: 16px;
        }
        ::placeholder {
            color: #73f683;
            font-size: 12px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #71f668;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            top: 100%;
            left: 0;
            border-radius: 25px;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            padding: 10px 15px;
            display: block;
        }
        nav ul li a {
            text-decoration: none;
            color: rgb(255, 255, 255);
            padding: 10px;
            border-radius: 20px;
        }
        nav ul li a:hover {
            background-color: #6bf062;
            border-radius: 25px;
            color: #3e0202;
        }
        #registro, #ingreso {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }
        #PesoCorporal {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #PesoCorporal form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #resultado {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="inicio">
        <hr>
        <h1>Bienvenido a la Página de <br> Cocina y Nutrición</h1>
        <hr>
    </header>
    <div id="menu" class="form-section">
        <nav class="menu">
            <ul>
                <li><a href="#recetas">Inicio</a></li>
                <li class="dropdown">
                    <a href="#">Información</a>
                    <div class="dropdown-content">
                        <a href="#">Más Información</a>
                        <a href="#">¿Cómo me cuido?</a>
                        <a href="#PesoCorporal">Ver peso corporal</a>
                    </div>
                </li>
                <li><a href="#registro">Registrarse</a></li>
                <li><a href="login.php">Ingreso</a></li>
                <li><a href="Systems/Systemsolar.html">Contáctenos</a></li>
            </ul>
        </nav>
    </div>
    <hr>
    <div id="registro" class="form-section">
        <h2>Registrarse</h2>
        <form action="registro.php" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required><br>
            <label for="correo">Correo electrónico:</label><br>
            <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required><br><br>
            <button type="submit" class="btn">Registrarse</button>
            <button type="button" class="btn cancelar">Cancelar</button>
        </form>
    </div>
    <div id="ingreso" class="form-section">
        <h2>Ingreso</h2>
        <form action="ingreso.php" method="post">
            <label for="nombre_ingreso">Nombre:</label><br>
            <input type="text" id="nombre_ingreso" name="nombre_ingreso" placeholder="Nombre" required><br>
            <label for="contrasena_ingreso">Contraseña:</label><br>
            <input type="password" id="contrasena_ingreso" name="contrasena_ingreso" placeholder="Contraseña" required><br><br>
            <button type="submit" class="btn">Ingresar</button>
            <button type="button" class="btn cancelar">Cancelar</button>
        </form>
    </div>
    <div id="recetas" class="container">
        <div class="section">
            <h2>Recetas Saludables.</h2>
            <p><li>Descubre deliciosas recetas para mantenerte saludable y lleno de energía.</li></p>
            <article>
                <img src="imag/ensalada-verde.jpg" alt="Ensalada Verde">
            </article>
            <a href="receta1.html" target="_blank">Receta de Ensalada Verde</a>
        </div>
        <div class="section">
            <h2><span>Consejos</span> Nutricionales.</h2>
            <ol>
                <li>Incluye una variedad de frutas y verduras todos los días.                                                     </li>
                <li>Prioriza alimentos ricos en fibra, como granos enteros, legumbres y vegetales.                                </li>
                <li>Limita la ingesta de alimentos procesados y ultraprocesados.                                                  </li>
                <li>Incorpora proteínas magras en tu dieta, como pollo, pescado y tofu.                                           </li>
                <li>Consume grasas saludables, como las presentes en el aguacate, las nueces y el aceite de oliva.                </li>
                <li>Bebe suficiente agua a lo largo del día para mantener una buena hidratación.                                  </li>
                <li>Controla el tamaño de las porciones para evitar excesos.                                                      </li>
                <li>Come regularmente durante el día para mantener niveles de energía estables.                                   </li>
                <li>Prioriza alimentos frescos y naturales en lugar de alimentos procesados.                                      </li>
                <li>Limita el consumo de azúcares añadidos, como los presentes en bebidas azucaradas y dulces.                    </li>
                <li>Incluye pescado graso en tu dieta, como salmón o sardinas, al menos dos veces por semana.                     </li>
                <li>Prefiere productos lácteos bajos en grasa, como leche desnatada o yogur griego.                               </li>
                <li>Controla tu consumo de sal y utiliza hierbas y especias para condimentar tus platos.                          </li>
                <li>Cocina en casa tanto como sea posible para tener control sobre los ingredientes y la preparación.             </li>
                <li>Planifica tus comidas y meriendas para evitar decisiones poco saludables en el momento.                       </li>
                <li>Mastica lentamente y disfruta de tus comidas para favorecer la digestión y la saciedad.                       </li>
                <li>Lee las etiquetas nutricionales de los productos para tomar decisiones informadas sobre tus alimentos.        </li>
                <li>Evita saltarte comidas, especialmente el desayuno, que es importante para comenzar el día con energía.        </li>
                <li>Mantén un equilibrio en tu dieta, incluyendo alimentos de todos los grupos alimenticios.                      </li>
                <li>Busca el asesoramiento de un profesional de la salud o un nutricionista si tienes dudas sobre tu alimentación.</li>
            </ol>
        </div>
        <div class="section"> 
            <h2>Artículos de Interés</h2>
            <p>Lee nuestros artículos para estar al tanto de las últimas tendencias en nutrición.</p>
            <a href="articulo1.html" target="_blank">Los Beneficios de una Dieta Rica en Fibra</a>
        </div>
        <div class="section" id="PesoCorporal">
            <h2>Calcula tu IMC</h2>
            <form onsubmit="calcularIMC(event)">
                <label for="altura">Altura (cm):</label><br>
                <input type="number" id="altura" name="altura" required><br>
                <label for="peso">Peso (kg):</label><br>
                <input type="number" id="peso" name="peso" required><br><br>
                <button type="submit" class="btn">Calcular IMC</button>
            </form>
            <div id="resultado"></div>
        </div>
    </div>
    <footer>
        <p>Derechos reservados © 2024 Cocina y Nutrición</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector("#menu ul li:nth-child(3) a").addEventListener("click", function(event) {
                event.preventDefault();
                document.getElementById("registro").style.display = "block";
            });
            document.querySelector("#menu ul li:nth-child(4) a").addEventListener("click", function(event) {
                event.preventDefault();
                document.getElementById("ingreso").style.display = "block";
            });
            document.querySelectorAll(".cancelar").forEach(button => {
                button.addEventListener("click", function() {
                    document.getElementById("registro").style.display = "none";
                    document.getElementById("ingreso").style.display = "none";
                });
            });
        });
        function calcularIMC(event) {
            event.preventDefault();
            var altura = parseFloat(document.getElementById("altura").value);
            var peso = parseFloat(document.getElementById("peso").value);
            var resultado = peso / Math.pow(altura / 100, 2);
            var interpretacion = '';
            if (resultado < 18.5) {
                interpretacion = "Bajo peso";
            } else if (resultado >= 18.5 && resultado <= 24.9) {
                interpretacion = "Peso normal o saludable";
            } else if (resultado >= 25 && resultado <= 29.9) {
                interpretacion = "Sobrepeso";
            } else {
                interpretacion = "Obesidad";
            }
            document.getElementById("resultado").innerText = "Tu índice de masa corporal (IMC) es: " + resultado.toFixed(2) + ". " + interpretacion;
        }
    </script>
</body>
</html>