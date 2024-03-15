<?php
$host = 'localhost';
$banco = 'pousada';
$user = 'root';
$pass = '';
$porta = '3306';

try {
	$pdo = new PDO("mysql:dbname=" . $banco . ";port=" . $porta . ";host=" . $host, $user, $pass);
} catch (Exception $e) {
	die ("erro: " . $e->getMessage());
}
