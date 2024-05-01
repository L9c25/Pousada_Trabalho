<?php
// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";
require_once "./controllers/aptController.php";

// Verifica se o ID da acomodação foi recebido
if (isset($_POST['acomodacaoID'])) {
    $aID = $_POST['acomodacaoID'];
   
    $d = new daoMysql($pdo);
    $response = $d->listar1($aID);

	header('Content-Type: application/json');
	$response = [
				'id' => $response['id'],
				'nome' => $response['nome'],
				'preco' => $response['preco'],
				'descricao' => $response['descricao'],
				'img' => $response['img'],
			];


    echo json_encode($response); // Se $d for um array, por exemplo
} else {
    http_response_code(400);
    echo "ID da acomodação não recebido.";
}
