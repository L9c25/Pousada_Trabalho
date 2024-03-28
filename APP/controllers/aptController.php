<?php

require "./models/aptModel.php";
require_once "./config/connect.php";

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
								where disponivel = 0");

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
	public function criarReserva($id_a, $id_u, $chek_in, $chek_out, $adult, $kid)
	{
		// query
		$sql = "SELECT id_u FROM reserva WHERE (id_u = $id_u)";
		// preparando a query
		$stmt = $this->pdo->prepare($sql);
		// executando a query
		$stmt->execute();

		if ($stmt->rowCount() >= 1) {
			// O usuario ja possui reserva
			header('Content-Type: application/json');
			$response = ['success' => false];
			echo json_encode($response);
			return false;
		} else {
		}

		$sql = "INSERT INTO reserva (id_a, id_u, chek_in, chek_out, pessoas, criancas, data) VALUES (:id_a, :id_u, :chek_in, :chek_out, :adult, :kid, :data);";



		try {
			$stmt = $this->pdo->prepare($sql);

			// Definir parâmetros
			date_default_timezone_set('America/Sao_Paulo');
			$param_data = date("Y-m-d H:i:s");
			$chek_in_string = $chek_in->format('Y-m-d H:i:s'); // Converte para string
			$chek_out_string = $chek_out->format('Y-m-d H:i:s'); // Converte para string

			// Vincule as variáveis à instrução preparada como parâmetros
			$stmt->bindParam(":id_a", $id_a, PDO::PARAM_INT);
			$stmt->bindParam(":id_u", $id_u, PDO::PARAM_INT);
			$stmt->bindParam(":chek_in", $chek_in_string, PDO::PARAM_STR);
			$stmt->bindParam(":chek_out", $chek_out_string, PDO::PARAM_STR);
			$stmt->bindParam(":adult", $adult, PDO::PARAM_INT);
			$stmt->bindParam(":kid", $kid, PDO::PARAM_INT);
			$stmt->bindParam(":data", $param_data, PDO::PARAM_STR);

			// executando a query.
			if ($stmt->execute()) {
			} else {
				// mensagem caso um erro ocorra.
				echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
			}
		} catch (PDOException $e) {
			die ("Erro na operação: " . $e->getMessage());
		} finally {
			unset($stmt); // Libera a variável $stmt
		}

		try {
			// removendo a disponibilidade da acomodação
			$sql = "UPDATE acomodacao SET disponivel = 1 WHERE (id = $id_a);";

			$stmt = $this->pdo->prepare($sql);

			// executando a query.
			if ($stmt->execute()) {
			} else {
				// mensagem caso um erro ocorra.
				echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
			}
		} catch (PDOException $e) {
			die ("Erro na operação: " . $e->getMessage());
		} finally {
			unset($stmt); // Libera a variável $stmt
		}
	}

	public function verifyReserva($id_u)
	{
		// query
		$sql = "SELECT id_u FROM reserva WHERE (id_u = $id_u)";
		// preparando a query
		$stmt = $this->pdo->prepare($sql);
		// executando a query
		$stmt->execute();

		if ($stmt->rowCount() >= 1) {
			// O usuario ja possui reserva
			$sql = $this->pdo->query("SELECT r.id_a ,r.chek_in, r.chek_out, a.nome, a.preco, DATEDIFF(r.chek_out, r.chek_in) AS 	intervalo,
				DATEDIFF(r.chek_out, r.chek_in) * a.preco AS total_preco, i.d0 AS img
				FROM reserva r
				JOIN acomodacao a ON r.id_a = a.id
				JOIN imagens i ON a.fk_img = i.id
				WHERE id_u = $id_u");


			if ($sql->rowCount() >= 1) {
				// O usuario ja possui reserva
				$dados = $sql->fetchAll();
				foreach ($dados as $item) {
					$lista = [
						'status' => 'success',
						'id' => $item['id_a'],
						'nome' => $item['nome'],
						'preco' => $item['preco'],
						'intervalo' => $item['intervalo'],
						'total_preco' => $item['total_preco'],
						'chek_in' => $item['chek_in'],
						'chek_out' => $item['chek_out'],
						'img'=> $item['img'],
					];
				}
				return $lista;
			} else {
				// O usuario ñ possui reserva
				$lista = [
					'status' => 'error',
				];
				return $lista;
			}
		} else {
			$lista = [
				'status' => 'error',
			];
			return $lista;
		}

	}

	public function deletReserva($id_a)
	{
		// Inicia uma transação
		$this->pdo->beginTransaction();
		try {
			// Deleta a reserva
			$stmt = $this->pdo->prepare("DELETE FROM reserva WHERE id_a = :id_a");
			$stmt->bindParam(':id_a', $id_a, PDO::PARAM_INT);
			$stmt->execute();

			// Atualiza a disponibilidade na pousada
			$stmt = $this->pdo->prepare("UPDATE acomodacao SET disponivel = '0' WHERE id = :id_a");
			$stmt->bindParam(':id_a', $id_a, PDO::PARAM_INT);
			$stmt->execute();

			// Commita as operações caso ambas sejam bem-sucedidas
			$this->pdo->commit();
			return true;
		} catch (Exception $e) {
			// Rollback nas operações em caso de erro
			$this->pdo->rollBack();
			return false;
		}
	}
}



// Funçao que calcula o valor total da estadia
function calc($intervalo, $p_noite)
{
	// Definindo as Variaveis
	$ValBase = $p_noite * $intervalo;

	// Formatando o valor da estadia
	$valorEstadia = number_format($ValBase, 2, ",", ".");

	// retornando o valor da estadia
	return $valorEstadia;
}


