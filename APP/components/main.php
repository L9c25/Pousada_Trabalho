<!-- INICIO DA PAGINA -->
<main id="inicio">
    <div class="txt-box-main">
        <h1 id="nome-empresa">TWO DOORS</h1>
        <p id="text-empresa">Descubra o paraíso em nossa Pousada, onde o luxo encontra a beleza natural. Estamos ansiosos para recebê-los e compartilhar a magia deste lugar especial. Seja para uma escapada romântica, uma aventura solitária ou um retiro familiar, a Two-Dors é o seu destino para criar lembranças que durarão uma vida inteira.</p>
    </div>
</main>

<!-- FILTRO DESKTOP -->

<div class="filtro-reserva" id="promocao">
    <form action="quartos.php" method="post" class="form-reserva">

        <div class="input-daterange">
            <input class="input-btn" id="CheckInDatePicker" type="text" value="" name="start" placeholder="CHEK-IN" autocomplete="off" required />
            <input class="input-btn" id="CheckOutDatePicker" type="text" value="" name="end" placeholder="CHEK-OUT" autocomplete="off" required />
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
                <input class="input-btn input-btn-mobile" id="mbCheckInDatePicker" type="text" name="start" autocomplete="off" placeholder="CHEK-IN" required   
                    style="margin-right: 0.4em;" /> 
                <input class="input-btn input-btn-mobile" id="mbCheckOutDatePicker" type="text" name="end" autocomplete="off" placeholder="CHEK-OUT" required/>
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

<div class="cx-txt-galeria">
    <h2 class="titulo-reservas" id="titulo-acomodacoes"><i class="fa-solid fa-star" style="font-size: .7em; margin: 0px 10px 0px 0px;"></i>reservas
        em promoção</h2>
</div>

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
                        <img class="overlay" src="./assets/img/<?php echo $apt->getImg1() ?>.jpg"></img>
                    </div>
                    <div class="card-content">
                        <div class="box-h1-card">
                            <a class="name">
                                <?php echo $apt->getNome() ?>
                            </a>
                        </div>

                        <span class="icons">
                            <i class="fa-solid fa-wifi"></i>
                            <p style="margin-right: 15px; margin-left: 5px;">wifi</p> 
                            <i class="fa-solid fa-umbrella-beach"></i>
                            <p style="margin-left: 5px;">vista para praia</p> 
                        </span>

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

<div class="cx-txt-galeria">
    <h2 class="titulo-reservas" id="titulo-reservas-2"><i class="fa-solid fa-circle-info" style="padding-right: 10px;"></i>SOBRE A TWO-DOORS</h2>
</div> 

<section class="sobre-nos" id="sobre-nos">
    <div class="bckg-sobre-nos">
        <picture class="img-sobre-nos" id="img-sobre-nos"></picture>
        <span class="arrow-right" id="arrow"></span>
        <span class="arrow-bottom" id="arrow"></span>

        <div class="txt-box-sobre-nos" id="txt-box-sobre-nos">

            <picture class="img-txt-box" id="img-txt-box"></picture>
            <h2>Nossa história</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus error consequatur numquam quibusdam nisi beatae rerum nostrum, magnam aspernatur repellendus sit totam laudantium officiis doloremque neque? Voluptatum odit at corrupti.</p>
        
        </div>
    </div>
</section>

<section class="sobre-nos">
    <div class="bckg-sobre-nos" id="cardapio">
        <picture class="img-sobre-nos" id="img-cardapio"></picture>
        <span class="arrow-left" id="arrow"></span>
        <span class="arrow-bottom" id="arrow"></span>

        <div class="txt-box-sobre-nos" id="txt-box-cardapio">
            <picture class="img-txt-box" id="img-txt-cardapio"></picture>
            <h2>Nosso Cardápio</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus error consequatur numquam quibusdam nisi beatae rerum nostrum, magnam aspernatur repellendus sit totam laudantium officiis doloremque neque? Voluptatum odit at corrupti.</p>
        </div>
    </div>
</section>


<!-- GALERIA DE FOTOS DA POUSADA -->
<div class="cx-txt-galeria">
    <h2 class="titulo-reservas" id="titulo-reservas-2"><i class="fa-solid fa-camera-retro" style="padding-right: 10px;"></i>Galeria de Fotos</h2>
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

<div class="container-rating">
    <h2 class="title-rating">Avaliações dos Usuários</h2>
        <div class="box-cards-rating">
            <div class="card-rating">
                <div class="card-content-rating">
                    <div class="card-user-bar">
                        <img class="user-img" src="./assets/img/user-3.jpg" alt="Usuário 1">
                        <p><strong>João Silva</strong></p>
                    </div>
                    <div class="card-text">
                        <p>A pousada é maravilhosa! Fiquei encantado com o atendimento e as instalações. Com certeza voltarei!</p>
                    </div>
                </div>
                <div class="rating">★★★★★</div>
            </div>
            <div class="card-rating">
                <div class="card-content-rating">
                    <div class="card-user-bar">
                        <img class="user-img" src="./assets/img/user-2.jpg" alt="Usuário 2">
                        <p><strong>Maria Santos</strong></p>
                    </div>
                    <div class="card-text">
                        <p>Excelente estadia! O café da manhã é delicioso e a localização é perfeita para quem quer relaxar.</p>
                    </div>
                </div>
                <div class="rating">★★★★☆</div>
            </div>
            <div class="card-rating">
                <div class="card-content-rating">
                    <div class="card-user-bar">
                        <img class="user-img" src="./assets/img/user-1.jpg" alt="Usuário 3">
                        <p><strong>Carla Oliveira</strong></p>
                    </div>
                    <div class="card-text">
                        <p>Recomendo a todos! A equipe é muito atenciosa e prestativa, me senti em casa durante toda a estadia.</p>
                    </div>
                </div>
                <div class="rating">★★★★★</div>
            </div>
        </div>
    </div>


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
<script src="assets\js\viewReserva.js"></script>
<!-- Script de configuraçoes do Datepicker -->
<script src="assets/js/myScrow_myDatepicker.js"></script>