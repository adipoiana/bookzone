<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/conectare-bd.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Librarie</title>
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/bookzone/view/stylesheet.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css"
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
</head>

<body>
	<div class="homepage">
		<div class="header">
			<div class="container-fluid">
				<div class="row">
					<div class="logo col-lg-2 col-md-2">
						<a class="nav-link active" aria-current="page" href="homepage.php">
							<img src="/bookzone/image/logo-bookzone-H.png" alt="Logo">
						</a>
					</div>
					<div class="nav-search col-lg-6 col-md-6">
						<form class="d-flex" role="search">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							<button class="button-search btn" type="submit"><i
									class="fa-solid fa-magnifying-glass"></i></button>
						</form>
					</div>
					<div class="user-cart col-lg-4 col-md-4">
						<nav class="navbar navbar-expand-lg">
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav">
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button"
											data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-solid fa-user"></i> Contul meu
										</a>
										<ul class=" autentificare dropdown-menu">
											<li><a class="dropdown-item" href="login.php">Autentificare</a></li>
											<li><a class="dropdown-item" href="signup.php">Cont nou</a></li>
											<li><a class="dropdown-item" href="log-out.php">Iesire din cont</a></li>
										</ul>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button"
											data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-solid fa-cart-shopping"></i> Cosul meu
										</a>
										<ul class="dropdown-menu">
										</ul>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="nav-bottom">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<nav class="navbar navbar-expand-lg">
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav">
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="categorii-de-carti.php" role="button"
											data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fa-solid fa-bars"></i>Categorii de carti
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="dezvoltare-personala.php">Dezvoltare
													personala</a>
											</li>
											<li><a class="dropdown-item"
													href="https://bookzone.ro/carti/pentru-copii">Carti pentru copii</a>
											</li>
											<li>
												<hr class="dropdown-divider">

											</li>
											<li><a class="dropdown-item" href="#">Carti fictiune</a>
											</li>
											<li><a class="dropdown-item" href="#">Beletristica</a>
											</li>
											<li><a class="dropdown-item" href="#">Istorie</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Top carti dezvoltare personala</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Top carti pentru copii</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<nav class="navbar navbar-expand-lg">
							<div class="container-fluid">
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav me-auto mb-2 mb-lg-0">
										<li class="nav-item">
											<a class="nav-link" href="#">Aboneaza-te la newsletter</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#">Contact</a>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
			</nav>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>

	<?
	include 'footer.php';
	?>