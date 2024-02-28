<main>
    <div class="txt-box-main">
        <h1>HOTEL CLUB</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error totam esse est eveniet provident dicta quod
            dignissimos, optio sit sunt debitis eligendi porro. Similique perspiciatis quae et suscipit eaque magni!</p>
        <a href="">NOSSOS SERVIÇOS</a>
    </div>
</main>

<div class="filtro-reserva">
    <form action="#" method="post" class="form-reserva">
            <div class="filtro-box">
                <label for="data_reserva">Data da Reserva:</label>
                <input type="date" id="data_reserva" name="data_reserva" required><br><br>
            </div>

            <span class="space"></span>

    
            <div class="filtro-box">
            <i class="fa-solid fa-person" style="padding-right: 10px; font-size: 1.4em;"></i>
                <label for="num_adultos">Número de Adultos</label>
                <select id="num_adultos" name="num_adultos" class="num-adulto"required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select><br><br>
            </div>

            <span class="space"></span>
    
            <div class="filtro-box">
            <i class="fa-solid fa-child" style="padding-right: 10px; font-size: 1.2em;"></i>
                <label for="num_criancas">Número de Crianças</label>
                <select id="num_criancas" name="num_criancas"  class="num-crianca" required>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select><br><br>
            </div>

            <span class="space"></span>

    
            <input type="submit" value="Reservar" class="btn-reservar">
        </form>
</div>

<div id="formulario-overlay" onclick="fecharFormulario()">
    <div id="formulario-container" onclick="event.stopPropagation()">
        <form action="#" method="post">
            <h2>Reserva de Hotel</h2>
            <label for="data_reserva">Data da Reserva:</label>
            <input type="date" id="data_reserva" name="data_reserva" required>

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

<h1 class="titulo-reservas">reservas mais populares</h1>

<div class="slide-container swiper">
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>


                </div>

                <div class="card-content">
                    <div class="box-h1-card">
                        <a href="" class="name">lorem ipsum</a>
                        <p class="description"><i class="fa-solid fa-star"></i>4.8/5.0</p>
                    </div>

                    <div class="txt-price-diaria">
                        <p class="valor-original">
                            <R1>450,00</R1>
                        </p>
                        <div class="valor-promocional">
                            <R1>350,00</R1> <p>/valor diária</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>

<!-- Swiper JS -->
<script src="assets/js/swiper-bundle.min.js"></script>