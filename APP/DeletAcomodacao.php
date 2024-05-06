<?php
	require_once("config/connect.php");
	require_once("controllers/aptController.php");
	$A_id = $_POST['acomodacaoID'];
	$A_img = $_POST['img'];

	$d = new daoMysql($pdo);
	
	$response = $d->deletAcomodacao($A_id, $A_img);

	if ($response){
		return true;
	} else{
		return false;
	}