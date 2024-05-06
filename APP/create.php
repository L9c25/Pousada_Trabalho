<?php
// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";
require_once "./controllers/aptController.php";

// Verifica se o ID da acomodação foi recebido
$arq = $_FILES['image'];

if (!$arq['error']) {
    $aNome = $_POST['nome'];
	$aPreco = $_POST['preco'];
	$aDesc = $_POST['desc'];
   
    
    // imagem maior que 2MB
    if($arq['size'] > 2097152)
        die("arquivo muito grande");

    $pasta = "./assets/img/ap/";
    $nomeimg = $arq['name'];
    $newNameImg = uniqid();
    $extension = strtolower(pathinfo($nomeimg, PATHINFO_EXTENSION));

    // tratamento caso o arquivo não seja uma imagem
    if($extension != 'jpg' && $extension != 'png'){
        die("tipo de arquivo n aceito. mande jpg ou png");
    }


    $sucess = move_uploaded_file($arq['tmp_name'], $pasta . $newNameImg . '.' . $extension);
    if($sucess){
        // variavel imagem
        $img = $newNameImg . "." . $extension;
        
        $d = new daoMysql($pdo);
        $response = $d->criarAcomodacao($aNome, $aDesc, $aPreco, $img);
        if($response){
            print "<script>location.href = 'painel.php'</script>";
        } else {
            http_response_code(400);
        }
    }

} else {
    http_response_code(400);
}