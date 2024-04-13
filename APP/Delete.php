<?php
	require_once("config/connect.php");
	require_once("controllers/aptController.php");
	$A_id = $_POST['A_id'];
	$d = new daoMysql($pdo);
	
	$response = $d->deletReserva($A_id);

	if ($response){
		return true;
	} else{
		return false;
	}