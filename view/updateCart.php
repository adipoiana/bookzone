<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/includes/config.php';
include 'session-cart.php';
// updateCart.php

if (isset($_POST['id_produs']) && isset($_POST['quantity']))
{
    $id_produs   = $_POST['id_produs'];
    $newQuantity = (int) $_POST['quantity'];

    $sql              = "SELECT * FROM produse where id_produs = $id_produs";
    $result           = mysqli_query($conn, $sql);
    $row              = mysqli_fetch_assoc($result);
    $pret_initial     = $row['pret'];
    $procent_reducere = $row['pret_redus'];

    $pret_redus = $pret_initial - ($pret_initial * $procent_reducere / 100);

    $total_price = $pret_redus * $newQuantity;


    // Verificați dacă produsul există în coș
    if (!empty($_SESSION['cart'][$id_produs]))
    {
        $_SESSION['cart'][$id_produs]['cantitate'] = $newQuantity;

        // Returnați numărul actualizat de produse din coș

        echo $total_price;
    }
}
?>