<header id="header-desktop">
	<picture class="logo-header"></picture>
	<nav class="nav-header">
		<a href="" class="nav-link">localização</a>
		<a href="" class="nav-link">promoções</a>
		<a href="" class="nav-link">reservas</a>
		<a href="" class="nav-link-last">suporte</a>
	</nav>
	<span>
		<span class="user_name">Olá !
			<?= $_SESSION['username']; ?>
		</span>
		<i class="fa-regular fa-user" id="icon-login">
			<a href="logout.php" style="padding-left: 1em;">
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
			<a href="" class="nav-link" id="nav-link-last">suporte</a>
			<a href="" class="nav-link" id="nav-link-last">
				<?= $_SESSION['username']; ?>
				<i class="fa-regular fa-user" id="icon-login" style="padding-left: 10px;"></i>
			</a>
			<a href="logout.php" style="padding-left: 1em;" class="nav-link" id="nav-link-last">Logout<i class="fa fa-chevron-left" style="color: black"></i>
			</a>
		</div>
	</nav>
	<i class="fa-solid fa-bars menu-icon"></i>
</header>