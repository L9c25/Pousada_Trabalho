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

		$sql = $this->pdo->query("SELECT * from acomodacao");

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();

			foreach ($dados as $item) {
				$p = new Apt();
				$p->setId($item['id']);
				$id = $p->getId();

				$p->setNome($item['nome']);
				$p->setPreco($item['preco']);
				$p->setDescricao($item['descricao']);
				$p->setFkImg($item['fk_img']);
				$p->setDisponivel($item['disponivel']);


				$smt = $this->pdo->query("SELECT *
											from imagens i
											JOIN acomodacao a on a.fk_img = i.id
											where a.id = $id;");

				$smt->execute();
				if ($smt->rowCount() > 0) {
					$imgData = $smt->fetch();
					$p->setImg1($imgData); // Aqui você seta img_1
				}

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