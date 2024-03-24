$(function () {
	$(".reservar").on("click", function () {
		swal.fire({
			title: 'Reservar',
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
				`,
			customClass: {
				confirmButton: 'btn_confirm_reserva',
			}
		})


		// Obtém o valor do botão clicado
		var ID = $(this).val();
		// Obtém o valor do user id
		var U_ID = $("#id_user").val();


		var start = $(".start").val()
		var end = $(".end").val()
		var adult = $("#num_adultos").val()
		var kid = $("#num_criancas").val()

		$(".btn_confirm_reserva").on("click", function () {
			$.ajax({
				method: "POST",
				url: "reservar.php",
				data: {
					"A_id": ID,
					"U_id": U_ID,
					"start": start,
					"end": end,
					"adult": adult,
					"kid": kid
				}
			}).done(function (response) {
				// Esta função é chamada quando a requisição é concluída com sucesso
				// printnado as acomodaçoes 
				$(".scrollable-div").html(response);

					// Reserva criada com sucesso
					const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.onmouseenter = Swal.stopTimer;
							toast.onmouseleave = Swal.resumeTimer;
						}
					});
					Toast.fire({
						icon: "success",
						title: "RESERVADO !"
					});
					
			}).fail(function (jqXHR, textStatus) {
				// Tratamento de falha na requisição
				// A reserva já existe

				const Toast = Swal.mixin({
					toast: true,
					position: "top-end",
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.onmouseenter = Swal.stopTimer;
						toast.onmouseleave = Swal.resumeTimer;
					}
				});
				Toast.fire({
					icon: "error",
					title: "Você ja tem uma reserva"
				});
			});
		})


	})
});