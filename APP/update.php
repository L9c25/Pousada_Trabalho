<?php
// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";
require_once "./controllers/aptController.php";

// Verifica se o ID da acomodação foi recebido
if (isset($_POST['acomodacaoID'])) {
    $aID = $_POST['acomodacaoID'];
	$aNome = $_POST['nome'];
	$aDesc = $_POST['descricao'];
	$aPreco = $_POST['preco'];


    $d = new daoMysql($pdo);
    $response = $d->updateReserva($aID, $aNome, $aDesc, $aPreco);

	
	echo json_encode($response); // Se $d for um array, por exemplo
	    
} else {
    http_response_code(400);
    echo "ID da acomodação não recebido.";
}
