<?php

session_start();

// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";
require_once "./controllers/aptController.php"

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/acomodacoes.css">
    <link rel="stylesheet" href="assets/css/acomodacoes850px.css">
    <title>Acomodações</title>
</head>
<body>
    <!-- FILTRO DESKTOP -->
    <?php include './components/header.php' ?>
    
<div class="filtro-reserva">
    <form action="acomodacoes.php" method="post" class="form-reserva">

        <div class="input-daterange" id="datepicker">
            <input class="input-btn" type="text" value="" name="start" placeholder="CHEK-IN" outl required />
            <input class="input-btn" type="text" value="" name="end" placeholder="CHEK-OUT" required />
        </div>

        <span class="space"></span>


        <div class="filtro-box">
            <i class="fa-solid fa-person" style="padding-right: 10px; font-size: 1.4em;"></i>
            <label for="num_adultos">Número de Adultos</label>
            <select id="num_adultos" name="num_adultos" class="num-adulto" required>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>
        </div>

        <span class="space"></span>

        <div class="filtro-box">
            <i class="fa-solid fa-child" style="padding-right: 10px; font-size: 1.2em;"></i>
            <label for="num_criancas">Número de Crianças</label>
            <select id="num_criancas" name="num_criancas" class="num-crianca" required>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>
        </div>
        
        <span class="space"></span>


        <input type="submit" value="Reservar" class="btn-reservar">
    </form>
</div>

<!-- FILTRO MOBILE -->

<div id="formulario-overlay" onclick="fecharFormulario()">
    <div id="formulario-container" onclick="event.stopPropagation()">
        <form action="acomodacoes.php" method="post">
            <h2>Reserva de Hotel</h2>

            <div class="input-daterange" id="datepicker">
                <input class="input-btn" type="text" value="YYYY/MM/DD" name="start" placeholder="CHEK-IN"
                    style="margin-right: 0.4em;"/>
                <input class="input-btn" type="text" value="YYYY/MM/DD" name="end" placeholder="CHEK-OUT"/>
            </div> 

            <label for="num_adultos">Número de Adultos (até 2):</label>
            <select id="num_adultos" name="num_adultos" required>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <label for="num_criancas">Número de Crianças (até 2):</label>
            <select id="num_criancas" name="num_criancas" required>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <input class="btn-reserva-mobile" type="submit" value="Reservar">
        </form>
    </div>
</div>

<section id="seção-acomodacoes">

    <div class="acomodacoes-container">

        <div class="filtro-acomodacao">
            <form class="form-acomodacao">
                <label class="check-box">
                <input class="cx-checkbox" type="checkbox" name="ar_condicionado"> Ar-condicionado
                </label>
                <label class="check-box">
                <input class="cx-checkbox" type="checkbox" name="tv"> Televisão
                </label>
                <label class="check-box">
                <input class="cx-checkbox" type="checkbox" name="wifi"> Wi-Fi
                </label>
                <label class="check-box">
                <input class="cx-checkbox" type="checkbox" name="vista_praia"> Vista para a praia
                </label>
                <!-- Adicione mais opções conforme necessário -->
                <input type="submit" value="Filtrar">
            </form>
        </div>

        <div class="carrosel-acomodacoes">
            <div class="card">
                <picture></picture>
                <div class="txt-box-card-acomodacao">
                    <h2 class="acomodacao-title">Lorem ipsum dolor</h2>
                    <p class="desc-card-acomodacao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis porro beatae eaque aspernatur ex facilis sequi ab repudiandae veniam natus voluptate
                        , numquam illum autem distinctio! Nesciunt ducimus ex quasi iusto.</p>
                    <R1 class="valor-acomodacao">R$300,00</R1>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="overlay-header"></section>


<!-- SCRIPT IMPORTS -->
    <script src="assets/js/script.js"></script>
    <!-- import datepicker JS -->
    <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
</body>
</html>