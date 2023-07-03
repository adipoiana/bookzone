<?php
session_start();

// Distrugerea sesiunii și eliminarea tuturor datelor de sesiune
session_destroy();

// Redirecționați utilizatorul către pagina de autentificare cu un mesaj de deconectare
header("Location: login.php?message=Deconectare%20reusita");
exit();
?>