<header>
	<picture class="logo-header"></picture>
	<nav class="nav-header">
		<a href="" class="nav-link">localização</a>
		<a href="" class="nav-link">promoções</a>
		<a href="" class="nav-link">reservas</a>
		<a href="" class="nav-link-last">suporte</a>
	</nav>
	<span>
		<span class="name">Olá ! <?= $_SESSION['username'];?></span>
		<i class="fa-regular fa-user" id="icon-login">
			<a href="logout.php" style="padding-left: 1em;">
				<i class="fa fa-chevron-left"></i>
			</a>
		</i>
	</span>
</header>