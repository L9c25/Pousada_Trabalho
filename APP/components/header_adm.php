<header id="header-desktop">
	<picture class="logo-header" onclick="location.href='index.php'"></picture>
	<nav class="nav-header">
		<a href="index.php" class="nav-link">Home</a>
		<a href="#footer" class="nav-link">localização</a>
		<a href="#promocao" class="nav-link">promoções</a>
		<p class="nav-link" id="icon-login">minha reserva</p>
		<!-- link exclusiva para adms -->
		<a href="test_CMD.php" class="nav-link-last" id="adm">Painel</a>
	</nav>
	<span class="btns">
		<span class="user_name" style="color: black;">Olá !
			<span id="name"><?= $_SESSION['username']; ?></span>
		</span>
			<a href="logout.php" class="logout">
				<i class="fa-solid fa-arrow-right-from-bracket"></i>
				Sair
			</a>
		</i>
	</span>
</header>

<header id="header-mobile" class="header-mobile">
	<picture class="logo-header"  onclick="location.href='index.php'"></picture>
	<nav class="nav-header">
		<div class="menu-content">
			<a href="#inicio" class="nav-link">Inicio</a>
			<a href="#footer" class="nav-link">localização</a>
			<a href="" class="nav-link">promoções</a>
			<p class="nav-link" id="icon-login">minha reserva</p>
			<button class="nav-link" onclick="toggleForm()" style="width: 100%;"><i
					class="fa-solid fa-calendar-days" style="padding-right: 10px; font-size: 1.3em;"></i>agendamento</button>
			<!-- link exclusiva para adms -->
			<a href="" class="nav-link" id="adm">painel</a>

			<a href="" class="nav-link" id="nav-link-last">
				<i class="fa-solid fa-user" style="padding-right: 10px;"></i>
				<?= $_SESSION['username']; ?>
			</a>
		</div>
		<a href="logout.php" class="nav-link-logout"><i class="fa-solid fa-arrow-right-from-bracket"
				style="color: #000000; margin-right: 10px;"></i>Logout
		</a>
	</nav>
	<i class="fa-solid fa-bars menu-icon"></i>
</header>