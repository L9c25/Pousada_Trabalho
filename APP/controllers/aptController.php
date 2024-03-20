<?php

require "./models/aptModel.php";

class daoMysql implements AptDAO
{
	private $pdo;
	public function __construct(PDO $drive)
	{
		$this->pdo = $drive;
	}

	public function listar()
	{
		$lista = [];

		$sql = $this->pdo->query("SELECT a.id,a.nome,a.preco,
								a.descricao,a.disponivel, i.d0 AS img_1
								FROM acomodacao a
								JOIN imagens i on a.fk_img = i.id
								where a.disponivel = 0");

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();

			foreach ($dados as $item) {
				$p = new Apt();
				$p->setId($item['id']);
				$p->setNome($item['nome']);
				$p->setPreco($item['preco']);
				$p->setDescricao($item['descricao']);
				$p->setImg1($item['img_1']);
				$p->setDisponivel($item['disponivel']);


				$lista[] = $p;
			}
		}
		return $lista;
	}

	public function geraJSON()
	{
		$sql = $this->pdo->query("SELECT * FROM produto");
		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
			print json_encode($dados);
		}

	}
}

function calc($intervalo, $qtd_ad, $qtd_kid, $p_noite)
{
	// Definindo as Variaveis
	$ValBase = $p_noite * $intervalo;

	$Acrecimo_Adult = 0;
	$AcKid = 0;

	// Adcional por 1 Adulto
	if ($qtd_ad == 2) {
		$Acrecimo_Adult = $p_noite * 0.1;
	}

	// Adcional por crianças
	if ($qtd_kid == 1) {
		$AcKid = ($p_noite * 0.2) * 0.5;
	} else if ($qtd_kid == 2) {
		$AcKid = (($p_noite * 0.2) * 0.5) * 2;
	}


	// Total da estadia
	$Tot = ($ValBase + $Acrecimo_Adult + $AcKid);

	// Formatando o valor da estadia
	$valorEstadia = number_format($Tot, 2, ",", ".");

	// retornando o valor da estadia
	return $valorEstadia;
}