<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/includes/config.php';

//se verifica daca variabilele nu sunt goale si daca sunt setate

if (!empty($_POST['nume']) && !empty($_POST['prenume']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])
	&& isset($_POST['nume']) && isset($_POST['prenume']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']))
{
	//Dacă toate variabilele sunt valide, preluăm valorile din $_POST pentru nume, prenume, email, username și parolă și le atribuim unor variabile separate.
	$nume            = $_POST['nume'];
	$prenume         = $_POST['prenume'];
	$email           = $_POST['email'];
	$username        = $_POST['username'];
	$password        = $_POST['password'];
	$password_hashed = password_hash($password, PASSWORD_DEFAULT);
	//verificarea dacă username-ul introdus de utilizator există deja în baza de date.
	$sql    = "SELECT username FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	$check  = mysqli_num_rows($result);
	//Dacă s-a găsit cel puțin o înregistrare cu același username, utilizatorul este redirecționat la pagina de login cu parametrul "?info=exista", indicând astfel că username-ul există deja și trebuie selectat un altul.
	if ($check > 0)
	{
		header("Location: login.php?info=exista");
		die();
	}

	//În caz contrar, adică dacă username-ul nu există deja, se inserează noile informații despre utilizator în baza de date, utilizând o interogare SQL de inserare.
	else
	{
		$sql    = "INSERT INTO users (nume, prenume, email, username, password) VALUES('$nume', '$prenume', '$email', '$username', '$password_hashed')";
		$result = mysqli_query($conn, $sql);
		header("location:login.php?info=ok");
	}
}
//Dacă variabilele $_POST nu sunt valide sau nu sunt setate, utilizatorul este redirecționat la pagina de login cu parametrul "?info=eroare", indicând astfel că a apărut o eroare în procesul de înregistrare.
else
{
	header("location:login.php?info=eroare");
}

?>