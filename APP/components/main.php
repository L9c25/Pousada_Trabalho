<!-- INICIO DA PAGINA -->
<main>
    <div class="txt-box-main">
        <h1>HOTEL CLUB</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error totam esse est eveniet provident dicta quod
            dignissimos, optio sit sunt debitis eligendi porro. Similique perspiciatis quae et suscipit eaque magni!</p>
    </div>
</main>

<!-- FILTRO DESKTOP -->

<div class="filtro-reserva">
    <form action="acomodacoes2.php" method="post" class="form-reserva">

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
        <form action="acomodacoes2.php" method="post">
            <h2>Reserva de Hotel</h2>

            <div class="input-daterange" id="datepicker">
                <input class="input-btn" type="text" value="YYYY/MM/DD" name="start" placeholder="CHEK-IN"
                    style="margin-right: 0.4em;"/>
                <input class="input-btn" type="text" value="YYYY/MM/DD" name="end" placeholder="CHEK-OUT"/>
            </div> 

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

            <input class="btn-reserva-mobile" type="submit" value="Reservar">
        </form>
    </div>
</div>

<!-- CARROUSEL DAS ACOMODAÇÕES -->

<h2 class="titulo-reservas"><i class="fa-solid fa-star" style="font-size: .7em; margin: 0px 10px 0px 0px;"></i>reservas em promoção</h2>

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
                            <a href="http://<?php echo $HOST ?>/test.php?id=<?php echo $apt->getId() ?>" class="name">
                                <?php echo $apt->getNome() ?>
                            </a>
                            <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                        </div>

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
<script src="assets/bootstrap/js/jquery-3.7.1.slim.min.js"></script>
<!-- Datepicker &  Bootstrap -->
<script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstra/js/popper.min.js"></script>
<!-- ScrollReveal -->
<script src="https://unpkg.com/scrollreveal"></script>

<script>
    $('.input-daterange').datepicker({
        language: "pt-BR",
        clearBtn: true,
        autoclose: true,
        format: "yyyy/mm/dd",
        startDate: '-0d',
        endDate: '+2m'
    });


    ScrollReveal().reveal('#img-1', {
        delay: 20,
        duration: 400,
        reset: true,
        easing: 'cubic-bezier(.25,.1,.64,.96)',
        origin: 'left',
        distance: '10px'
    });

    ScrollReveal().reveal('#img-2', {
        delay: 20,
        duration: 400,
        reset: true,
        easing: 'cubic-bezier(.25,.1,.64,.96)',
        origin: 'right',
        distance: '10px'

    });

    ScrollReveal().reveal('#img-3', {
        delay: 20,
        duration: 410,
        reset: true,
        easing: 'cubic-bezier(.25,.1,.64,.96)',
        origin: 'right',
        distance: '10px'
    });

    ScrollReveal().reveal('#img-5', {
        delay: 20,
        duration: 500,
        reset: true,
        easing: 'cubic-bezier(.25,.1,.64,.96)',
        origin: 'left',
        distance: '10px'
    });

    ScrollReveal().reveal('#img-6', {
        delay: 20,
        duration: 510,
        reset: true,
        easing: 'cubic-bezier(.25,.1,.64,.96)',
        origin: 'left',
        distance: '10px'
    });

    ScrollReveal().reveal('#img-4', {
        delay: 20,
        duration: 510,
        reset: true,
        easing: 'cubic-bezier(.25,.1,.64,.96)',
        origin: 'right',
        distance: '10px'
    });

</script>