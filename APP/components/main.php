<!-- INICIO DA PAGINA -->
<main>
    <div class="txt-box-main">
        <h1>HOTEL CLUB</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error totam esse est eveniet provident dicta quod
            dignissimos, optio sit sunt debitis eligendi porro. Similique perspiciatis quae et suscipit eaque magni!</p>
        <a href="">NOSSOS SERVIÇOS</a>
    </div>
</main>

<!-- FILTRO DESKTOP -->

<div class="filtro-reserva">
    <form action="acomodacoes.php" method="post" class="form-reserva">

        <div class="input-daterange" id="datepicker">
            <input type="text" class="" name="start" placeholder="CHEK-IN" style="margin-right: 0.4em;" required />
            <input type="" class="" name="end" placeholder="CHEK-OUT" required />
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
        <form action="#" method="post">
            <h2>Reserva de Hotel</h2>
            <label for="check_in" style="padding: 0px">Check-in:</label>
            <input type="date" id="check_in" name="check_in" required>

            <label for="check_out">Check-out:</label>
            <input type="date" id="check_out" name="check_out" required>

            <label for="num_adultos">Número de Adultos (até 2):</label>
            <select id="num_adultos" name="num_adultos" required>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <label for="num_criancas">Número de Crianças (até 2):</label>
            <select id="num_criancas" name="num_criancas" required>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <input type="submit" value="Reservar">
        </form>
    </div>
</div>

<!-- CARROUSEL DAS ACOMODAÇÕES -->

<h2 class="titulo-reservas"><i class="fa-solid fa-star" style="font-size: .7em; margin: 10px 10px 0px 0px;"></i>reservas
    mais populares</h2>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">



                <?php
                $d = new daoMysql($pdo);
                $dados = $d->listar();
                foreach ($dados as $apt):
                ?>
                    <div class="image-content">
                        <span class="overlay" id="<?php $apt->getImg1()?>"></span>
                    </div>
                    <div class="card-content">
                        <div class="box-h1-card">
                            <a href="" class="name">
                                <?php $apt->getNome() ?>
                            </a>
                            <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                        </div>

                        <div class="txt-price-diaria">
                            <p class="valor-original">
                                <R1>
                                    <?php ($apt->getPreco() * 1.1) ?>
                                </R1>
                            </p>
                            <div class="valor-promocional">
                                <R1>
                                    <?php $apt->getPreco() ?>
                                </R1>
                                <p>/valor diária</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>

<div class="swiper-button-next swiper-navBtn"></div>
<div class="swiper-button-prev swiper-navBtn"></div>
<div class="swiper-pagination"></div>
</div>

<div class="espacamento"><span></span></div>

<!-- GALERIA DE FOTOS DA POUSADA -->

<div class="cx-txt-galeria">
    <h2 class="titulo-reservas">nossas fotos internas</h2>
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
<!-- jquery -->
<script src="assets/bootstrap/js/jquery-3.7.1.slim.min.js"></script>
<!-- datepicker &  bootstrap-->
<script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstra/js/popper.min.js"></script>

<script>
    $('.input-daterange').datepicker({
        language: "pt-BR",
        clearBtn: true,
        format: "yyyy/mm/dd",
        todayHighlight: true,
        startDate: '-1',

    });
</script>