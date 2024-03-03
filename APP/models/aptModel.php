<?php
require "config/connect.php";

class Apt
{
	private $id;
	private $nome;
	private $preco;
	private $descricao;
	private $disponivel;
	private $img1;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setPreco($preco)
	{
		$this->preco = $preco;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDisponivel($disponivel)
	{
		$this->disponivel = $disponivel;
	}

	public function getDisponivel()
	{
		return $this->disponivel;
	}

	public function setImg1($img1)
	{
		$this->img1 = $img1;
	}

	public function getImg1()
	{
		return $this->img1;
	}
}

interface AptDAO
{
	public function listar();

	public function geraJSON();
}