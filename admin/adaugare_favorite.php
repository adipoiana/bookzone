
<?php
// Verifică dacă utilizatorul este autentificat
// ...
$esteAutentificat = true; // Poți utiliza o logică specifică aplicației tale pentru a determina acest lucru

// Verifică dacă produsul este deja în lista de favorite
$esteInListaFavorite = false; // Poți utiliza o interogare către tabela "favorites" pentru a determina acest lucru

// Procesează acțiunea de adăugare/eliminare a produsului în/din lista de favorite
if ($esteAutentificat && isset($_POST['favorite'])) {
    // Verifică dacă produsul este deja în lista de favorite
    if ($esteInListaFavorite) {
        // Elimină produsul din lista de favorite
        // Codul pentru eliminarea înregistrării din tabela "favorites"
        // DELETE FROM favorites WHERE user_id = $userId AND product_id = $productId;
        $esteInListaFavorite = false; // Actualizează starea produsului în lista de favorite
    } else {
        // Adaugă produsul în lista de favorite
        // Codul pentru inserarea unei noi înregistrări în tabela "favorites"
        // INSERT INTO favorites (user_id, product_id) VALUES ($userId, $productId);
        $esteInListaFavorite = true; // Actualizează starea produsului în lista de favorite
    }
}
?>
<?php
session_start();

$esteAutentificat = false;
if (isset($_SESSION['id_utilizator'])) {
    // Utilizatorul este autentificat, variabila de sesiune 'id_utilizator' există
    $esteAutentificat = true;
}
// Verifică dacă produsul este deja în lista de favorite
$id_utilizator = "$_POST['id_utilizator']";
$id_produsul = "$_POST['id_produs']";
// Efectuează interogarea pentru a verifica dacă produsul este în lista de favorite
$sql = "SELECT COUNT(*) as count FROM favorites WHERE id_utilizator = $id_utilizator AND id_produs = $id_produs";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

$esteInListaFavorite = ($count > 0); // Verifică dacă există înregistrări în tabela favorites pentru utilizatorul și produsul specificați

?>

<div class="col-lg-4 text-center price-cart">
    <div class="afisare_pret">
        <p> Pret: <?php echo $afisare_pret_initial . $afisare_pret_redus; ?></p>
    </div>
    <div class="product-cart">
        <?php if ($esteAutentificat) { ?>
            <!-- Butonul pentru adăugarea/removarea produsului în/din lista de favorite -->
            <form method="POST">
                <button type="submit" name="favorite"><?php echo $esteInListaFavorite ? 'Remove from Favorites' : 'Add to Favorites'; ?></button>
            </form>
        <?php } else { ?>
            <!-- Afișează un mesaj pentru utilizatorul neautentificat -->
            <p>Autentifică-te pentru a adăuga produsul în lista de favorite.</p>
        <?php } ?>
    </div>
</div>
