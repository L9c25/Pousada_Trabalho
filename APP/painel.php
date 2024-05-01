<?php
// Inicia a sessão
session_start();

// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";
require_once "./controllers/aptController.php";


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
	<title>Painel</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/painel.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./assets/js/painel.js"></script>

<body>
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Acomodação</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
								class="material-icons">&#xE147;</i> <span>Add Acomodação</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
								class="material-icons">&#xE15C;</i> <span>Delete</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Image</th>
						<th>Name</th>
						<th>Address</th>
						<th>Reais</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>


					<?php
					// Defenindo variaveis:
					$HOST = $_SERVER['HTTP_HOST'];

					$d = new daoMysql($pdo);
					$dados = $d->listar();
					$qtd = count($dados);
					foreach ($dados as $apt):
						$id = $apt->getId();
						?>

						<tr>

							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox<?php echo $id ?>" name="options[]"
										value="<?php echo $id ?>">
									<label for="checkbox<?php echo $id ?>"></label>
								</span>
								<span class="aptID" style="display: none"><?php echo $id ?></span>
							</td>
							<td>
								<picture class="img-card"
									style="background-image: url(./assets/img/<?php echo $apt->getImg1() ?>.jpg);">
								</picture>
							</td>
							<td><?php echo $apt->getNome() ?></td>
							<td>
								<p class="desc"><?php echo $apt->getDescricao() ?></p>
							</td>
							<td>R$<?php echo number_format($apt->getPreco(), 2, ",", "."); ?>
							</td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons"
										data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons"
										data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>

					<?php endforeach ?>
				</tbody>
			</table>


			<div class="clearfix">
				<div class="hint-text">Showing <b><?php echo $qtd ?></b> out of <b><?php echo $qtd ?></b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>




	<!-- ADD Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Add Acomodação</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Preço</label>
							<input type="number" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descriçao</label>
							<textarea class="form-control" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>




	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Edit Acomodação</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Name</label>
							<input id="editNome" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Preço</label>
							<input id="editPreco" type="number" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descriçao</label>
							<textarea id="editDesc" class="form-control" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info update" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>



	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Deletar Acomodação</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Tem certeza que deseja deletar essa acomodação?</p>
						<p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" id="conDelet" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>


	<script>
		$(document).ready(function (e) {
			$(".edit").click(function (e) {
				acomodacaoID = $(this).closest('tr').find(".aptID").text();

				$.ajax({
					url: 'edit.php',
					type: 'POST',
					data: { acomodacaoID: acomodacaoID },
					success: function (response) {
						// Manipule a resposta do servidor aqui
						var A_nome = response.nome;
						var A_preco = response.preco;
						var A_desc = response.descricao;

						$("#editNome").val(A_nome);
						$("#editDesc").val(A_desc);
						$("#editPreco").val(A_preco);
					},
					error: function (xhr, status, error) {

						console.error(xhr.responseText);
					}
				});

				$(".update").click(function (e) {

					var nome = $("#editNome").val();
					var desc = $("#editDesc").val();
					var preco = $("#editPreco").val();


					$.ajax({
						url: 'update.php',
						type: 'POST',
						data: {
							acomodacaoID: acomodacaoID,
							nome: nome,
							descricao: desc,
							preco: preco
						},
						success: function (response) {
							
						},
						error: function (xhr, status, error) {
							console.error(xhr.responseText);
						}
					})
				})

			});


		});



		$(".delete").click(function (e) {
			acomodacaoID = $(this).closest('tr').find(".aptID").text();
			
			$("#conDelet").click(function (e) {
				$.ajax({
					url: 'DeletAcomodacao.php',
					type: 'POST',
					data: {
						acomodacaoID: acomodacaoID
					},
					success: function (response) {
						//? Reserva deletada com suceso
						const Toast = Swal.mixin({
							toast: true,
							position: "top-end",
							showConfirmButton: false,
							timer: 1500,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.onmouseenter = Swal.stopTimer;
								toast.onmouseleave = Swal.resumeTimer;
							}
						});
						Toast.fire({
							icon: "success",
							title: "Acomodação Deletada"
						});
					},
					error: function (xhr, status, error) {
						console.error(xhr.responseText);
					}
				})
			})
		});

	</script>
</body>

</html>