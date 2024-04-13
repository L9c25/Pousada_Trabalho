<?php 
	header('Content-Type: text/html; charset=utf-8');
	$host = 'localhost';
	$banco = 'pousada';
	$user = 'root';
	$pass = '';
	$porta = '3306';

	try {
		$pdo = new PDO("mysql:dbname=".$banco.";port=".$porta.";host=".$host,$user,$pass,array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		  ));
	} catch (Exception $e) {
		die("erro: ".$e->getMessage());
	}
