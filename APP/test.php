
	<?php
	$d = new daoMysql($pdo);
	$dados = $d->listar();
	foreach($dados as $p):
		?>
		<div class="product">
			<a href="http://localhost:8800/APP/prod.php?id=<?php echo ($p->getId()) ?>" target="_blank">
				<div class="produc-image" style="background-image:
					url('./components/body/Assets/img/<?php echo ($p->getImg()) ?>');">
				</div>
			</a>
			<div class="info-product">
				<h3>
					<?php echo ($p->getNome()) ?>
				</h3>
				<div class="rating-product">
					<p class="rating">&#9733&#9733&#9733&#9733&#9733</p>
					<p class="avaliantions">999</p>
				</div>
				<p class="origin-price"><i>R$
						<?php echo ($p->getPreco()) ?>
					</i></p>
				<span class="container-descount">
					<p class="descount-price">R$
						<?php echo ($p->getPreco() * 0.9) ?>
					</p>
					<p class="text-info">no pix</p>
				</span>
			</div>
		</div>
	<?php endforeach ?>