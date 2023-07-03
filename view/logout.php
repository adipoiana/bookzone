<?php
session_start();

// Distrugerea sesiunii curente
session_unset();
session_destroy();

// Redirecționare către pagina de autentificare sau altă pagină relevantă
header("Location: login.php"); // înlocuiți cu pagina relevantă după deconectare
exit();
?>