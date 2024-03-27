<!-- INICIO DA PAGINA -->
<main id="inicio">
    <div class="txt-box-main">
        <h1>TWO DOORS</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error totam esse est eveniet provident dicta quod
            dignissimos, optio sit sunt debitis eligendi porro. Similique perspiciatis quae et suscipit eaque magni!</p>
    </div>
</main>

<!-- FILTRO DESKTOP -->

<div class="filtro-reserva">
    <form action="quartos.php" method="post" class="form-reserva">

        <div class="input-daterange" id="datepicker">
            <input class="input-btn" type="text" value="" name="start" placeholder="CHEK-IN" autocomplete="off" outl required />
            <input class="input-btn" type="text" value="" name="end" placeholder="CHEK-OUT" autocomplete="off" required />
        </div>

        <span class="space"></span>


        <div class="filtro-box">
            <i class="fa-solid fa-person" style="padding-right: 10px; font-size: 1.4em;"></i>
            <label for="num_adultos">Adultos</label>
            <select id="num_adultos" name="num_adultos" class="num-adulto" required>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>

        </div>

        <span class="space"></span>

        <div class="filtro-box">
            <i class="fa-solid fa-child" style="padding-right: 10px; font-size: 1.2em;"></i>
            <label for="num_criancas">Crianças</label>
            <select id="num_criancas" name="num_criancas" class="num-crianca" required>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>
        </div>

        <span class="space"></span>


        <input type="submit" value="Reservar" class="btn-reservar">
    </form>
</div>

<!-- FILTRO MOBILE -->

<div id="formulario-overlay" onclick="fecharFormulario()">
    <div id="formulario-container" onclick="event.stopPropagation()">
        <form action="quartos.php" method="post">
            <h2>Reserva de Hotel</h2>

            <div class="input-daterange" id="datepicker-mobile">
                <input class="input-btn" id="input-btn-mobile" type="text" name="start" autocomplete="off" placeholder="CHEK-IN" required   
                    style="margin-right: 0.4em;" /> 
                <input class="input-btn" id="input-btn-mobile" type="text" name="end" autocomplete="off" placeholder="CHEK-OUT" required/>
            </div>

            <label for="num_adultos">Adultos</label>
            <select id="num_adultos" name="num_adultos">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <label for="num_criancas">Crianças</label>
            <select id="num_criancas" name="num_criancas">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <input class="btn-reserva-mobile" type="submit" value="Reservar">
        </form>
    </div>
</div>

<!-- CARROUSEL DAS ACOMODAÇÕES -->

<h2 class="titulo-reservas" id="promocao"><i class="fa-solid fa-star" style="font-size: .7em; margin: 0px 10px 0px 0px;"></i>reservas
    em promoção</h2>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <?php
            // Defenindo variaveis:
            $HOST = $_SERVER['HTTP_HOST'];

            $d = new daoMysql($pdo);
            $dados = $d->listar();
            foreach ($dados as $apt):
                ?>
                <div class="card swiper-slide" id="card">
                    <div class="image-content">
                        <img class="overlay" src="./assets/imagens/<?php echo $apt->getImg1() ?>.jpg"></img>
                    </div>
                    <div class="card-content">
                        <div class="box-h1-card">
                            <a class="name">
                                <?php echo $apt->getNome() ?>
                            </a>
                        </div>
                        <span class="icons"><i class="fa-solid fa-wifi"> </i> <i
                                class="fa-solid fa-umbrella-beach"></i></span>

                        <div class="txt-price-diaria">
                            <p class="valor-original">
                                <R1>
                                    R$
                                    <?php echo ($apt->getPreco() * 1.1) ?>
                                </R1>
                            </p>
                            <div class="valor-promocional">
                                <R1>
                                    R$
                                    <?php echo $apt->getPreco() ?>
                                </R1>
                                <p>/valor diária</p>
                            </div>
                        </div>
                    </div>
                </div>



            <?php endforeach ?>

        </div>
    </div>
    <!-- <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div> -->
    <div class="swiper-pagination"></div>
</div>



<div class="espacamento"><span></span></div>

<!-- GALERIA DE FOTOS DA POUSADA -->

<div class="cx-txt-galeria">
    <h2 class="titulo-reservas" id="titulo-reservas-2">nossas fotos internas</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam mollitia, impedit asperiores, vitae assumenda
        unde totam voluptate repellendus aut a illum! Nesciunt impedit repellendus eligendi ipsam eius illum minus enim.
    </p>
</div>

<section class="galeria-container">
    <div class="container-1">
        <picture class="img-maior-1" id="img-1"></picture>
        <div class="container-img-1">
            <picture id="img-2"></picture>
            <picture class="img-bottom" id="img-3"></picture>
        </div>
    </div>
    <div class="container-2">
        <picture class="img-maior-1" id="img-4"></picture>
        <div class="container-img-2">
            <picture id="img-5"></picture>
            <picture class="img-bottom" id="img-6"></picture>
        </div>
    </div>
</section>

<!-- Swiper JS -->
<script src="assets/js/swiper-bundle.min.js"></script>
<!-- Jquery -->
<script src="assets\js\jquery-3.7.1.min.js"></script>
<!-- Datepicker &  Bootstrap -->
<script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Script by me -->
<script src="assets/js/script.js"></script>
<script src="assets/js/carrousel.js"></script>
<!-- ScrollReveal -->
<script src="assets\ScrollReveal\scrollreveal.js"></script>
<!-- Sweetalert -->
<script src="assets\Sweetalert2\sweetalert2.all.min.js"></script>


<!-- script para a vizualisação da reserva -->
<script>
    $("#icon-login").on("click", function () {
        // definindo o ID com base no value do button
        var U_ID = $("#id_user").val();

        $.ajax({
            method: "POST",
            url: "verifyReserva.php", // test para erro .php -> .pp
            data: {
                "U_id": U_ID,
            }
        }).done(function (response) {
            //? Esta função é chamada quando a requisição é concluída com sucesso
            var resp = response.success;
            var A_id = response.id;

            if (resp) {
                //? Possui uma reserva
                Swal.fire({
                    title: "<strong>Sua Reservas</strong>",
                    html: `
                            <button class="btn btn-danger" id="deletReserva">Delet</button>
                            <button id="A_id" hiden value=""></button>
                            
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
                    title: "<strong>Você não possui reserva</strong>",
                    html: `You can use <b>bold text</b>,
                        <a href="#">links</a>,
                        and other HTML tags
                        `,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: `<i class="fa fa-thumbs-up"></i> Great!`,
                    confirmButtonAriaLabel: "Thumbs up, great!",
                    cancelButtonText: `<i class="fa fa-thumbs-down"></i> `,
                    cancelButtonAriaLabel: "Thumbs down"
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
</script>

<script>
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
</script>

<script src="assets/js/myScrow_myDatepicker.js"></script>
<!-- INICIO DA PAGINA -->
<main>
    <div class="txt-box-main">
        <h1>TWO DOORS</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error totam esse est eveniet provident dicta quod
            dignissimos, optio sit sunt debitis eligendi porro. Similique perspiciatis quae et suscipit eaque magni!</p>
    </div>
</main>

<!-- FILTRO DESKTOP -->

<div class="filtro-reserva">
    <form action="quartos.php" method="post" class="form-reserva">

        <div class="input-daterange" id="datepicker">
            <input class="input-btn" type="text" value="" name="start" placeholder="CHEK-IN" outl required />
            <input class="input-btn" type="text" value="" name="end" placeholder="CHEK-OUT" required />
        </div>

        <span class="space"></span>


        <div class="filtro-box">
            <i class="fa-solid fa-person" style="padding-right: 10px; font-size: 1.4em;"></i>
            <label for="num_adultos">Número de Adultos</label>
            <select id="num_adultos" name="num_adultos" class="num-adulto" required>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>

        </div>

        <span class="space"></span>

        <div class="filtro-box">
            <i class="fa-solid fa-child" style="padding-right: 10px; font-size: 1.2em;"></i>
            <label for="num_criancas">Número de Crianças</label>
            <select id="num_criancas" name="num_criancas" class="num-crianca" required>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br><br>
        </div>

        <span class="space"></span>


        <input type="submit" value="Reservar" class="btn-reservar">
    </form>
</div>

<!-- FILTRO MOBILE -->

<div id="formulario-overlay" onclick="fecharFormulario()">
    <div id="formulario-container" onclick="event.stopPropagation()">
        <form action="quartos.php" method="post">
            <h2>Reserva de Hotel</h2>

            <div class="input-daterange" id="datepicker">
                <input class="input-btn" type="text" name="start" placeholder="CHEK-IN" style="margin-right: 0.4em;" required/>
                <input class="input-btn" type="text" name="end" placeholder="CHEK-OUT" required/>
            </div>

            <label for="num_adultos">Número de Adultos (até 2):</label>
            <select id="num_adultos" name="num_adultos">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <label for="num_criancas">Número de Crianças (até 2):</label>
            <select id="num_criancas" name="num_criancas">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <input class="btn-reserva-mobile" type="submit" value="Reservar">
        </form>
    </div>
</div>

<!-- CARROUSEL DAS ACOMODAÇÕES -->

<h2 class="titulo-reservas"><i class="fa-solid fa-star" style="font-size: .7em; margin: 0px 10px 0px 0px;"></i>reservas
    em promoção</h2>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <?php
            // Defenindo variaveis:
            $HOST = $_SERVER['HTTP_HOST'];

            $d = new daoMysql($pdo);
            $dados = $d->listar();
            foreach ($dados as $apt):
                ?>
                <div class="card swiper-slide" id="card">
                    <div class="image-content">
                        <img class="overlay" src="./assets/imagens/<?php echo $apt->getImg1() ?>.jpg"></img>
                    </div>
                    <div class="card-content">
                        <div class="box-h1-card">
                            <a class="name">
                                <?php echo $apt->getNome() ?>
                            </a>
                        </div>
                        <span class="icons"><i class="fa-solid fa-wifi"> </i> <i
                                class="fa-solid fa-umbrella-beach"></i></span>

                        <div class="txt-price-diaria">
                            <p class="valor-original">
                                <R1>
                                    R$
                                    <?php echo ($apt->getPreco() * 1.1) ?>
                                </R1>
                            </p>
                            <div class="valor-promocional">
                                <R1>
                                    R$
                                    <?php echo $apt->getPreco() ?>
                                </R1>
                                <p>/valor diária</p>
                            </div>
                        </div>
                    </div>
                </div>



            <?php endforeach ?>

        </div>
    </div>
    <!-- <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div> -->
    <div class="swiper-pagination"></div>
</div>



<div class="espacamento"><span></span></div>

<!-- GALERIA DE FOTOS DA POUSADA -->

<div class="cx-txt-galeria">
    <h2 class="titulo-reservas" id="titulo-reservas-2">nossas fotos internas</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam mollitia, impedit asperiores, vitae assumenda
        unde totam voluptate repellendus aut a illum! Nesciunt impedit repellendus eligendi ipsam eius illum minus enim.
    </p>
</div>

<section class="galeria-container">
    <div class="container-1">
        <picture class="img-maior-1" id="img-1"></picture>
        <div class="container-img-1">
            <picture id="img-2"></picture>
            <picture class="img-bottom" id="img-3"></picture>
        </div>
    </div>
    <div class="container-2">
        <picture class="img-maior-1" id="img-4"></picture>
        <div class="container-img-2">
            <picture id="img-5"></picture>
            <picture class="img-bottom" id="img-6"></picture>
        </div>
    </div>
</section>

<!-- Swiper JS -->
<script src="assets/js/swiper-bundle.min.js"></script>
<!-- Jquery -->
<script src="assets\js\jquery-3.7.1.min.js"></script>
<!-- Datepicker &  Bootstrap -->
<script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Script by me -->
<script src="assets/js/script.js"></script>
<script src="assets/js/carrousel.js"></script>
<!-- ScrollReveal -->
<script src="assets\ScrollReveal\scrollreveal.js"></script>
<!-- Sweetalert -->
<script src="assets\Sweetalert2\sweetalert2.all.min.js"></script>


<!-- script para a vizualisação da reserva -->
<script>
    $("#icon-login").on("click", function () {
        // definindo o ID com base no value do button
        var U_ID = $("#id_user").val();

        $.ajax({
            method: "POST",
            url: "verifyReserva.php", // test para erro .php -> .pp
            data: {
                "U_id": U_ID,
            }
        }).done(function (response) {
            //? Esta função é chamada quando a requisição é concluída com sucesso
            var resp = response.success;
            var A_id = response.id;

            if (resp) {
                //? Possui uma reserva
                Swal.fire({
                    title: "<strong>Sua Reservas</strong>",
                    html: `
                            <button class="btn btn-danger" id="deletReserva">Delet</button>
                            <button id="A_id" hiden value=""></button>
                            
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
                    title: "<strong>Você não possui reserva</strong>",
                    html: `You can use <b>bold text</b>,
                        <a href="#">links</a>,
                        and other HTML tags
                        `,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: `<i class="fa fa-thumbs-up"></i> Great!`,
                    confirmButtonAriaLabel: "Thumbs up, great!",
                    cancelButtonText: `<i class="fa fa-thumbs-down"></i> `,
                    cancelButtonAriaLabel: "Thumbs down"
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
</script>

<script>
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
</script>

<script src="assets/js/myScrow_myDatepicker.js"></script>