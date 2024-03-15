<?php
// Inicia a sessão
session_start();

// Verifica se a variável de sessão está definida
if (!isset ($_SESSION['username'])) {
    // Redireciona o usuário para a página de login ou outra página de sua escolha
    header("Location: login.php");
    // Termina o script para garantir que o redirecionamento funcione corretamente
    exit();
}

// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";
require_once "./controllers/aptController.php"

    ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- import carrosel css-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- import icones-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- import bootstrap css -->
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">
    
    <!-- Import swiper css -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    
    <!-- import CSS date picker -->
    <link rel="stylesheet" href="assets\datepicker\css\bootstrap-datepicker.min.css">
    
    <!-- CSS by me -->
    <link rel="stylesheet" href="assets/css/Desktop.css">
    <link rel="stylesheet" href="assets/css/800px.css">
    <link rel="stylesheet" href="assets/css/350px.css">

    <title>Hotel Club</title>
</head>

<body>
    <?php
    // Verificação se o Usuario é um administrador
    $id = $_SESSION["id"];

    $dao = new daoMysql($pdo);
    $sql = $pdo->query("SELECT tipo 
                                From usuario
                                where id = $id;");
    $tipo = $sql->fetch();

    if ($tipo[0] == 1) {
        include './components/header_adm.php';
    } else {
        include './components/header.php';
    }
    ?>

    <section class="overlay-header"></section>

    <?php include './components/main.php' ?>

    <?php include './components/footer.php' ?>


    <!-- SCRIPT IMPORTS -->
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/carrousel.js"></script>
    <!-- import datepicker JS -->
    <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>

</body>

</html>