<?php

	$s_date =  $_POST['start'];
	$e_date = $_POST['end'];

	$qtd_adulto = intval($_POST['num_adultos']);
	$qtd_kid = intval($_POST['num_criancas']);

	echo ($s_date);
	echo "<br>";
	echo ($e_date);
	echo "<br>";
	echo ($qtd_adulto);
	echo "<br>";
	echo ($qtd_kid);