<?php 
// Incluir arquivo de conexão com o banco
require_once "./config/connect.php";
require_once "./controllers/aptController.php";

// Definindo Variaves da reserva
$s_date = date_create($_POST['start']);
$e_date = date_create($_POST['end']);


// Definindo o intervalo entre as datas
$intervalo = (int) date_diff($s_date, $e_date)->format('%a');
// Corrigindo caso a pesoa reserve por 1 dia:
if ($intervalo == 0){
    $intervalo = 1;
}
?>


                <?php
                $d = new daoMysql($pdo);
                $dados = $d->listar();
                foreach ($dados as $apt):
                    ?>

                    <?php $val = calc($intervalo, $apt->getPreco()) ?>

                    <div class="card">
                        <picture class="img-card"
                            style="background-image: url(./assets/imagens/<?php echo $apt->getImg1() ?>.jpg);"></picture>
                        <div class="txt-box-card-acomodacao">
                            <h2 class="acomodacao-title">
                                <?php echo $apt->getNome() ?><span
                                    style="font-size: .8em; font-weight: lighter; display: flex; align-items: center;"><i
                                        class="fa-solid fa-star"
                                        style="margin-right: 8px; font-size: .8em;"></i>4.8/5.0</span>
                            </h2>
                            <span class="icons"><i class="fa-solid fa-wifi"> </i> <i class="fa-solid fa-umbrella-beach">
                                </i></span>
                            <p class="desc-card-acomodacao">
                                <?php echo $apt->getDescricao() ?>
                            </p>
                            <R1>
                                <?php echo number_format($apt->getPreco(), 2, ",", ".") ?>/noite
                            </R1>
                            <R1 class="valor-acomodacao">
                                <?php echo $val ?> por
                                <?php echo $intervalo ?> noite
                                
                                <button class="btn btn-success reservar" value="<?php echo $apt->getId();?>">
                                
                                ID- <?php echo $apt->getId();?>
                                
                                </button>
                            </R1>
                        </div>
                    </div>
                <?php endforeach ?>
                <Script src="assets\js\reservar.js"></Script>
