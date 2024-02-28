<?php
    // Inicia a sessão
    session_start();

    // Verifica se a variável de sessão está definida
    if (!isset($_SESSION['logado'])) {
        // Redireciona o usuário para a página de login ou outra página de sua escolha
        header("Location: login.php");
        // Termina o script para garantir que o redirecionamento funcione corretamente
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/Desktop.css">
    <link rel="stylesheet" href="assets/js/script.js">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/800px.css">
    <link rel="stylesheet" href="assets/js/carrousel.js">
    <title>Hotel Club</title>
</head>

<body>

    <?php include './components/header.php'?>

    <section class="overlay-header"></section>

    <?php include './components/body_1.php'?>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>

<script src="assets/js/script.js"></script>
<script src="assets/js/carrousel.js"></script>

</html>