<header id="header-desktop">
	<picture class="logo-header" onclick="location.href='index.php'"></picture>
	<nav class="nav-header" id="desktop">
		<a href="#inicio" class="nav-link">Sobre nós</a>
		<a href="#promocao" class="nav-link">promoções</a>
		<a href="#footer" class="nav-link">localização</a>
	</nav>
	<span class="btns">
		
			<span class="fs-5 nm-fade">Olá ! Guest</span>
			<i class="fa-solid fa-bars menu-icon fs-5 nm-fade" id="menu-guest"></i>
	

		<div class="modal-desktop">
			<a href="login.php" class="nav-link nav-link-singin">Sign In</a> /
			<a href="register.php" class="nav-link nav-link-register">Register</a>
			<i class="fa-solid fa-angle-up fs-5 close-modal"></i>
		</div>
		
	</span>
</header>

<header id="header-mobile" class="header-mobile">
	<picture class="logo-header" onclick="location.href='index.php'"></picture>
	<nav class="nav-header">
		<div class="menu-content">
			<a href="#inicio" class="nav-link">Sobre nós</a>
			<a href="#titulo-acomodacoes" class="nav-link">promoções</a>
			<a href="#footer" class="nav-link">localização</a>
			<button class="nav-link" onclick="toggleForm()" style="width: 100%;">agendamento<i
					class="fa-solid fa-calendar-days" style="padding-left: 10px; font-size: 1.3em;"></i></button>
			<a href="" class="nav-link" id="nav-link-last">Guest
				<i class="fa-solid fa-user" style="padding-left: 10px;"></i>
			</a>
		</div>
		<a href="login.php" class="nav-link-singin">Sign In</a>
		<a href="register.php" class="nav-link-register">Register</a>
	</nav>
	<i class="fa-solid fa-bars menu-icon"></i>
</header>