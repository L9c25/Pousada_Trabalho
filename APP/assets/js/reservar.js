$(function () {
	$(".reservar").on("click", function () {

		// Usando 'this' para referenciar o botão específico que foi clicado
		// Obtém o valor do botão clicado
		var ID = $(this).val();
		
		// Obtém o valor do user id
		var U_ID = $("#id_user").val();


		var start = $(".start").val()
		var end = $(".end").val()

		// Exibe o valor do botão no alert
		// alert(U_ID);

		$.ajax({
			method: "POST",
			url: "reservar.php", // test para erro .php -> .pp
			data: { "A_id": ID,
					"U_id": U_ID,
					"start": start,
					"end": end 
					}
		}).done(function (response) {
			// Esta função é chamada quando a requisição é concluída com sucesso
			$(".scrollable-div").html(response);
			swal.fire({
				title: 'Reservar',
				text: "OIE",
				icon: 'none',
				confirmButtonText: 'reservar',
				color: '#0a0427',
				confirmButtonColor: '#0a0427',
				
				html: `
					<div class="card_input">
						<label for="swal-input1">Numero do cartao</label>
						<input id="swal-input1" class="swal2-input" name="inp_1">
					</div>
					<div class="card_input">
						<label for="swal-input2">CVV</label>
						<input id="swal-input2" class="swal2-input" name="inp_2">
					</div>
				`

			
			
			})
			// console.log("foi")

		}).fail(function (jqXHR, textStatus) {
			
			swal.fire({
				title: 'Error!',
				text: "Não foi possivel concluir a reserva",
				icon: 'error',
				confirmButtonText: 'OK',
				color: '#0a0427',
				confirmButtonColor: '#0a0427'
			})
			// Esta função é chamada se ocorrer algum erro na requisição
			// console.error("A requisição falhou: " + textStatus);
		});
		
	})
});