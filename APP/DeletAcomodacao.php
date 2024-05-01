<?php
	require_once("config/connect.php");
	require_once("controllers/aptController.php");
	$A_id = $_POST['acomodacaoID'];
	$d = new daoMysql($pdo);
	
	$response = $d->deletAcomodacao($A_id);

	if ($response){
		return true;
	} else{
		return false;
	}