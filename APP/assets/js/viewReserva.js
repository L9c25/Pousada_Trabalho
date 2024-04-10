var iconlogin = document.querySelectorAll('#icon-login')

$(iconlogin).on("click", function () {
	// definindo o ID com base no value do button
	$.ajax({
		method: "POST",
		url: "verifyReserva.php", // test para erro .php -> .pp
	}).done(function (response) {
		//? Esta função é chamada quando a requisição é concluída com sucesso
		var resp = response.success;
		var A_id = response.id;
		var A_nome = response.nome;
		var A_preco = response.preco;
		var A_totalprc = response.total_preco;
		var A_intervalo = response.intervalo;
		var A_img = response.img;

		if (resp) {
			//? Possui uma reserva
			Swal.fire({
				title: "<strong>Sua Reserva</strong>",
				html: ` 
                            <button id="A_id" hiden value=""></button>
                            <div class="card-acomodacao" id="card">
                        <picture class="img-card"
                            style="background-image: url(./assets/img/${A_img}.jpg);"></picture>
                        <div class="txt-box-card-acomodacao">
                            <h2 class="acomodacao-title"> ${A_nome}
                                <span style="font-size: .8em; font-weight: lighter; display: flex; align-items: center;">
                                    <i class="fa-solid fa-star" style="margin-right: 8px; font-size: .8em;"></i>
                                    4.8/5.0
                                </span>
                            </h2>

                            <span class="icons">
                            <i class="fa-solid fa-wifi"> </i> <i class="fa-solid fa-umbrella-beach"></i>
                            </span>

                            <p class="desc-card-acomodacao">
                                
                            </p>
                            <R1>
                                ${A_preco}/noite
                            </R1>
                            <R1 class="valor-acomodacao">
                                 R$${A_totalprc} por ${A_intervalo}
                                 noite
                                

                                 <button class="btn btn-danger" id="deletReserva">Delet</button>
                                
                                </button>
                            </R1>
                        </div>
                    </div>
                        `,
				focusConfirm: false,
				confirmButtonAriaLabel: "Thumbs up, great!",
				didOpen: () => {
					// Aqui o SweetAlert já está aberto e podemos manipular seu conteúdo
					$("#A_id").val(A_id); // Atribui o valor da variável A_id ao botão
				},
			});
		} else {
			//? Ñ possui uma reserva
			Swal.fire({
				title: "<strong>Você ainda não possui reserva</strong>",
				showCloseButton: true,
				showCancelButton: false,
				focusConfirm: true,
				showConfirmButton:true
				//?confirmButtonText: `<i class="fa fa-thumbs-up"></i>`,
				//?confirmButtonAriaLabel: "Thumbs up, great!",
				//?cancelButtonText: `<i class="fa fa-thumbs-down"></i> `,
				//?cancelButtonAriaLabel: "Thumbs down"
			})
		}

	}).fail(function (jqXHR, textStatus) {
		//? Tratamento de falha na requisição
		Swal.fire({
			title: "Error!",
			text: "O correu um erro ao tentarmos verificar se você tem uma reserva",
			icon: "error"
		});
	}), "json";
})


$(document).ready(function () {
	// Adiciona o manipulador de eventos quando o documento estiver pronto
	$(document).on('click', '#deletReserva', function () {
		// Oculta o botão clicado
		var A_id = $("#A_id").val()
		// console.log(A_id)

		$.ajax({
			method: "POST",
			url: "Delete.php", // test para erro .php -> .pp
			data: {"A_id": A_id}

		}).done(function (response) {
			//? Esta função é chamada quando a requisição é concluída com sucesso
			var resp = response.success;

			// console.log(resp)
			console.log("ok")

			//? Reserva deletada com suceso
			const Toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer: 1800,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.onmouseenter = Swal.stopTimer;
					toast.onmouseleave = Swal.resumeTimer;
				}
			});
			Toast.fire({
				icon: "success",
				title: "RESERVA DELETADA COM SUCESSO"
			});


		}).fail(function (jqXHR, textStatus) {
			//? Tratamento de falha na requisição
			console.log("erro")
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
		});
	});
});