<?php
// Inicia a sessão
session_start();

// Verifica se a variável de sessão está definida
if (!isset($_SESSION['username'])) {
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

// Definindo o intervalo entre as datas
$intervalo = (int) date_diff($s_date, $e_date)->format('%a');
// Corrigindo caso a pesoa reserve por 1 dia:
if ($intervalo == 0) {
    $intervalo = 1;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="assets\Sweetalert2\sweetalert2.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\datepicker\css\bootstrap-datepicker.min.css">
    <!-- CSS By me -->
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/acomodacoes.css">
    <link rel="stylesheet" href="assets/css/acomodacoes850px.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Acomodações</title>
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

    <!-- FILTRO DESKTOP -->
    <div class="filtro-reserva">
        <form action="quartos.php" method="POST" class="form-reserva">

            <div class="input-daterange">
                <input class="input-btn start" type="text" id="CheckInDatePicker" value="<?php echo $_POST["start"] ?>"
                    name="start" placeholder="CHEK-IN" autocomplete="off" value="" readonly required />
                <input class="input-btn end" type="text" id="CheckOutDatePicker" value="<?php echo $_POST['end'] ?>"
                    name="end" placeholder="CHEK-OUT" autocomplete="off" value="" readonly required />
            </div>

            <span class="space"></span>


            <div class="filtro-box">
                <i class="fa-solid fa-person" style="padding-right: 10px; font-size: 1.4em;"></i>
                <label for="num_adultos">Adultos</label>
                <select id="num_adultos" name="num_adultos" class="num-adulto" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select><br><br>
            </div>

            <span class="space"></span>

            <div class="filtro-box">
                <i class="fa-solid fa-child" style="padding-right: 10px; font-size: 1.2em;"></i>
                <label for="num_criancas">Crianças</label>
                <select id="num_criancas" name="num_criancas" class="num-crianca" required>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select><br><br>
            </div>

            <span class="space"></span>

        </form>
    </div>

    <!-- FILTRO MOBILE -->

    <div id="formulario-overlay" onclick="fecharFormulario()">
        <div id="formulario-container" onclick="event.stopPropagation()">
            <form action="quartos.php" method="POST">
                <h2>Reserva de Hotel</h2>

                <div class="input-daterange" id="datepicker">
                    <input id="mbCheckInDatePicker" class="input-btn input-btn-mobile" type="text" value="<?php echo $_POST["start"] ?>" name="start"
                        placeholder="CHEK-IN" autocomplete="off" value="" readonly style="margin-right: 0.4em;" />
                    <input id="mbCheckOutDatePicker" class="input-btn input-btn-mobile" type="text" value="<?php echo $_POST['end'] ?>" name="end"
                        placeholder="CHEK-OUT" autocomplete="off" value="" readonly />
                </div>

                <label for="num_adultos">Adultos</label>
                <select id="num_adultos" name="num_adultos" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <label for="num_criancas">Crianças</label>
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

            <div class="scrollable-div">


                <?php
                $d = new daoMysql($pdo);
                $dados = $d->listar();
                foreach ($dados as $apt):
                    ?>

                    <?php $val = calc($intervalo, $apt->getPreco()) ?>

                    <div class="card" id="card">
                        <picture class="img-card"
                            style="background-image: url(./assets/img/<?php echo $apt->getImg1() ?>.jpg);"></picture>
                        <div class="txt-box-card-acomodacao">
                            <h2 class="acomodacao-title">
                                <?php echo $apt->getNome() ?><span
                                    style="font-size: .8em; font-weight: lighter; display: flex; align-items: center;"><i
                                        class="fa-solid fa-star"
                                        style="margin-right: 8px; font-size: .8em;"></i>4.8/5.0</span>
                            </h2>
                            <span class="icons"><i class="fa-solid fa-wifi"> </i> <i class="fa-solid fa-umbrella-beach">
                                </i></span>
                            <p class="desc-card-acomodacao">
                                <?php echo $apt->getDescricao() ?>
                            </p>
                            <R1>
                                <?php echo number_format($apt->getPreco(), 2, ",", ".") ?>/noite
                            </R1>
                            <R1 class="valor-acomodacao">
                                <?php echo $val ?> por
                                <?php echo $intervalo ?> noite

                                <button class="btn btn-success reservar" value="<?php echo $apt->getId(); ?>">Reservar</button>
                            </R1>
                        </div>
                    </div>
                <?php endforeach ?>


            </div>
        </div>
    </section>


    <section class="overlay-header"></section>


    <!-- Jquery -->
    <script src="assets\js\jquery-3.7.1.min.js"></script>
    <!-- Sweetalert -->
    <script src="assets\Sweetalert2\sweetalert2.all.min.js"></script>
    <!-- Datepicker &  Bootstrap -->
    <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $("#num_adultos").val(<?php echo $qtd_adulto ?>).change();
        $("#num_criancas").val(<?php echo $qtd_kid ?>).change();

        
    </script>
    <script src="assets/js/script.js"></script>
    <!-- Script para o a realização de uma reserva-->
    <Script src="assets/js/reservar.js"></Script>
    <!-- script para a vizualisação da reserva -->
    <script src="assets\js\viewReserva.js"></script>
    <!-- Script de configuraçoes do Datepicker -->
    <script src="assets/js/myScrow_myDatepicker.js"></script>
</body>

<?php include './components/footer.php' ?>

</html>