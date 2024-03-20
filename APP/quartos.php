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
require_once "./controllers/aptController.php";

// Definindo Variaves da reserva
$s_date = date_create($_POST['start']);
$e_date = date_create($_POST['end']);

$qtd_adulto = intval($_POST['num_adultos']);
$qtd_kid = intval($_POST['num_criancas']);

$intervalo = (int) date_diff($s_date, $e_date)->format('%a');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\datepicker\css\bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/css/acomodacoes.css">
    <link rel="stylesheet" href="assets/css/acomodacoes850px.css">
    <title>Acomodações</title>
</head>

<body>
    <!-- FILTRO DESKTOP -->
    <?php include './components/header.php' ?>

    <div class="filtro-reserva">
        <form action="quartos.php" method="POST" class="form-reserva">

            <div class="input-daterange" id="datepicker">
                <input class="input-btn" type="text" value="<?php echo $_POST["start"] ?>" name="start"
                    placeholder="CHEK-IN" required />
                <input class="input-btn" type="text" value="<?php echo $_POST['end'] ?>" name="end"
                    placeholder="CHEK-OUT" required />
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
            <form action="quartos.php" method="POST">
                <h2>Reserva de Hotel</h2>

                <div class="input-daterange" id="datepicker">
                    <input class="input-btn" type="text" value="<?php echo $_POST["start"] ?>" name="start"
                        placeholder="CHEK-IN" style="margin-right: 0.4em;" />
                    <input class="input-btn" type="text" value="<?php echo $_POST['end'] ?>" name="end"
                        placeholder="CHEK-OUT" />
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
                    <div class="container-check-1">
                        <label class="check-box">
                            <input class="cx-checkbox" type="checkbox" name="ar_condicionado"> Ar-condicionado <i
                                class="fa-solid fa-snowflake"></i>
                        </label>
                        <label class="check-box">
                            <input class="cx-checkbox" type="checkbox" name="tv"> Televisão <i
                                class="fa-solid fa-tv"></i>
                        </label>
                    </div>
                    <div class="container-check-2">
                        <label class="check-box">
                            <input class="cx-checkbox" type="checkbox" name="wifi"> Wi-Fi <i
                                class="fa-solid fa-wifi"></i>
                        </label>
                        <label class="check-box">
                            <input class="cx-checkbox" type="checkbox" name="vista_praia"> Vista para a praia <i
                                class="fa-solid fa-umbrella-beach"></i>
                        </label>
                    </div>
                    <!-- Adicione mais opções conforme necessário -->
                </form>
                <input class="btn-filtro" type="submit" value="Filtrar">
            </div>

            <div class="scrollable-div" onmousedown="startDrag(event)" onmouseup="stopDrag()"
                ontouchstart="startDrag(event)" ontouchend="stopDrag()">


                <?php
                $d = new daoMysql($pdo);
                $dados = $d->listar();
                foreach ($dados as $apt):
                    ?>

                    <?php $val = calc($intervalo, $qtd_adulto, $qtd_kid, $apt->getPreco()) ?>

                    <div class="card">
                        <picture class="img-card"
                            style="background-image: url(./assets/imagens/<?php echo $apt->getImg1() ?>.jpg);"></picture>
                        <div class="txt-box-card-acomodacao">
                            <h2 class="acomodacao-title">
                                <?php echo $apt->getNome() ?><span
                                    style="font-size: .8em; font-weight: lighter; display: flex; align-items: center;"><i
                                        class="fa-solid fa-star"
                                        style="margin-right: 8px; font-size: .8em;"></i>4.8/5.0</span>
                            </h2>
                            <p class="description"></p>
                            <span class="icons"><i class="fa-solid fa-wifi"> </i> <i class="fa-solid fa-umbrella-beach">
                                </i></span>
                            <p class="desc-card-acomodacao">
                                <?php echo $apt->getDescricao() ?>
                            </p>
                            <R1>
                                <?php echo number_format($apt->getPreco(), 2, ",", ".") ?>/noite
                            </R1>
                            <R1 class="valor-acomodacao">
                                <?php echo $val?>-----por <?php echo $intervalo?>/noites
                                <a href="http://<?php echo $HOST ?>/test.php?id=<?php echo $apt->getId() ?>"><button
                                        class="btn btn-success">ID-
                                        <?php echo $apt->getId() ?>
                                    </button></a>
                            </R1>
                        </div>
                    </div>
                <?php endforeach ?>



            </div>
        </div>

        <a href="index.php" style="color: black;">Voltar</a>
    </section>


    <section class="overlay-header"></section>


    <!-- Jquery -->
    <script src="assets/bootstrap/js/jquery-3.7.1.slim.min.js"></script>
    <!-- Datepicker &  Bootstrap -->
    <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstra/js/popper.min.js"></script>
    <script>
        $("#num_adultos").val(<?php echo $qtd_adulto ?>).change();
        $("#num_criancas").val(<?php echo $qtd_kid ?>).change();


        $('.input-daterange').datepicker({
            language: "pt-BR",
            clearBtn: true,
            autoclose: true,
            format: "yyyy/mm/dd",
            startDate: '-0d',
            endDate: '+2m'
        });




    </script>
</body>

</html>