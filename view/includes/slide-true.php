    <?php
    $carouselSql    = "SELECT * FROM produse WHERE homepage = 1";
    $carouselResult = mysqli_query($conn, $carouselSql);
    $active = true; // Variabilă pentru gestionarea clasei "active" a primului element

    while ($carouselRow = mysqli_fetch_assoc($carouselResult))
    {
        $link = "detalii_produs.php?id_produs=" . $carouselRow['id_produs']; // Generați link-ul către pagina produsului

        ?>