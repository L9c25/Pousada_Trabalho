<?php 
	// Inicializando a sessão
	session_start();

	// Limpando todas as variáveis de sessão
	// a super global $_SESSION é um array cheio de coisas atribuindo 
	// um array vazio a ele ele limpara toda a informaçao
	$_SESSION = array();
	
	// Destruindo a sessão.
	session_destroy();

	// Redirecionando a pag de login
	print "<script>location.href = 'login.php'</script>";
