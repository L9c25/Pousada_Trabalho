<header id="header-desktop">
	<picture class="logo-header" onclick="location.href='index.php'"></picture>
	<nav class="nav-header" id="desktop">
	</nav>
	<span class="btns">
		<span class="user_name">Olá !
			<span id="name"><?= $_SESSION['username']; ?></span>
		</span>
		<i class="fa-regular fa-user">
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
			<button class="nav-link" onclick="toggleForm()" style="width: 100%;">agendamento<i
					class="fa-solid fa-calendar-days" style="padding-left: 10px; font-size: 1.3em;"></i></button>
			<a href="" class="nav-link" id="nav-link-last">
				<?= $_SESSION['username']; ?>
				<i class="fa-solid fa-user" style="padding-left: 10px;"></i>
			</a>
		</div>
		<a href="logout.php" class="nav-link-logout"><i class="fa-solid fa-arrow-right-from-bracket"
				style="color: #000000; margin-right: 10px;"></i>Logout
		</a>
	</nav>
	<i class="fa-solid fa-bars menu-icon"></i>
</header>