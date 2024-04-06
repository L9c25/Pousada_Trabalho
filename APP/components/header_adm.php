<header id="header-desktop">
	<picture class="logo-header" onclick="location.href='index.php'"></picture>
	<nav class="nav-header">
	    <a href="#inicio" class="nav-link">Inicio</a>
		<a href="#footer" class="nav-link">localização</a>
		<a href="#promocao" class="nav-link">promoções</a>
		<p class="nav-link" id="icon-login">minha reserva</p>
		<!-- link exclusiva para adms -->
		<a href="test_CMD.php" class="nav-link-last" id="adm">CMD</a>
	</nav>
	<span class="btns">
		<span class="user_name" style="color: black;">Olá !
			<span id="name"><?= $_SESSION['username']; ?></span>
		</span>
		<i class="fa-regular fa-user">
			<a href="logout.php" class="logout">
				<i class="fa fa-chevron-left" ></i>
			</a>
		</i>
	</span>
</header>

<header id="header-mobile" class="header-mobile">
	<picture class="logo-header"></picture>
	<nav class="nav-header">
		<div class="menu-content">
			<a href="#inicio" class="nav-link">Inicio</a>
			<a href="#footer" class="nav-link">localização</a>
			<a href="" class="nav-link">promoções</a>
			<p class="nav-link" id="icon-login">minha reserva</p>
			<button class="nav-link" onclick="toggleForm()" style="width: 100%;">agendamento<i class="fa-solid fa-calendar-days" style="padding-left: 10px; font-size: 1.3em;"></i></button>
			<!-- link exclusiva para adms -->
			<a href="test_CMD.php" class="nav-link" id="adm">CMD</a>

			<a href="" class="nav-link" id="nav-link-last">
				<?= $_SESSION['username']; ?>
				<i class="fa-solid fa-user" style="padding-left: 10px;"></i>
			</a>
		</div>
			<a href="logout.php" class="nav-link-logout">Logout<i class="fa fa-chevron-left" style="color: #ff3434; margin-left: 10px;" ></i>
			</a>
	</nav>
	<i class="fa-solid fa-bars menu-icon"></i>
</header>