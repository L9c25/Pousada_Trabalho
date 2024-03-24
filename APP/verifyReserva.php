<?php
	require_once("config/connect.php");
	require_once("controllers/aptController.php");
	$u_id = $_POST['U_id'];
	$d = new daoMysql($pdo);
	$response = $d->verifyReserva($u_id);


	if ($response["status"] == "success") {
		// possui a reserva
		header('Content-Type: application/json');
		$response = ['success' => true,
					 'nome' => $response['nome'],
					 'preco' => $response['preco'],
					 'intervalo'=> $response['intervalo'],
					 'total_preco'=> $response['total_preco'],
					 'chek_in'=> $response['chek_in'],
					 'chek_out'=> $response['chek_out']
					];
		echo json_encode($response);
	} else {
		// ñ possui a reserva
		header('Content-Type: application/json');
		$response = ['success' => false];
		echo json_encode($response);
	}

	