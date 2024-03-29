<header id="header-desktop">
	<picture class="logo-header"></picture>
	<nav class="nav-header" id="desktop">
		<a href="" class="nav-link">localização</a>
		<a href="" class="nav-link">promoções</a>
		<a href="" class="nav-link">reservas</a>
		<a href="" class="nav-link">suporte</a>
	</nav>
	<span class="btns">
		<span class="user_name">Olá !
			<span id="name"><?= $_SESSION['username']; ?></span>
		</span>
		<i class="fa-regular fa-user" id="icon-login">
			<a href="logout.php" class="logout">
				<i class="fa fa-chevron-left"></i>
			</a>
		</i>
	</span>
</header>

<header id="header-mobile" class="header-mobile">
	<picture class="logo-header"></picture>
	<nav class="nav-header">
		<div class="menu-content">
			<a href="" class="nav-link">localização</a>
			<a href="" class="nav-link">promoções</a>
			<a href="" class="nav-link">reservas</a>
			<a href="quartos.php" class="nav-link">suporte</a>
			<button class="nav-link" onclick="toggleForm()" style="width: 100%;">agendamento<i class="fa-solid fa-calendar-days" style="padding-left: 10px; font-size: 1.3em;"></i></button>
			<a href="" class="nav-link" id="nav-link-last">
				<?= $_SESSION['username']; ?>
				<i class="fa-solid fa-user" id="icon-login" style="padding-left: 10px;"></i>
			</a>
		</div>
			<a href="logout.php" class="nav-link-logout">Logout<i class="fa fa-chevron-left" style="color: #ff3434; margin-left: 10px;" ></i>
			</a>
	</nav>
	<i class="fa-solid fa-bars menu-icon"></i>
</header>