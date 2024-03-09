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

// Definindo Variaves
$s_date = date_create($_POST['start']);
$e_date = date_create($_POST['end']);

$qtd_adulto = intval($_POST['num_adultos']);
$qtd_kid = intval($_POST['num_criancas']);

$intervalo = (int) date_diff($s_date, $e_date)->format('%a');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>acomodacoes</title>
	<!-- import bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<?php
	$d = new daoMysql($pdo);
	$dados = $d->listar();
	foreach ($dados as $apt):
		?>
		<?php $val = $intervalo * $apt->getPreco(); ?>

		<div class="h3 mb-2">
			<?php echo $apt->getPreco() ?>
		</div> <br>

		<p>
			<?php echo $intervalo ?> dias x
			<?php echo $apt->getPreco() ?> por noite = R$
			<?php echo number_format($val, 2, ",", ".") ?>

		<?php endforeach ?>
</body>

</html>