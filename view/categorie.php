<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/header_user.php';

// Verifica daca s-a selectat o categorie
if (isset($_GET['id_categorie']))
{
    //Obținerea ID-ului categoriei selectate
    $id_categorie = $_GET['id_categorie'];

    $sql_cat    = "SELECT * FROM categorii WHERE id_categorie= '$id_categorie'";
    $result_cat = mysqli_query($conn, $sql_cat);
    $row_cat    = mysqli_fetch_assoc($result_cat);
    if ($row_cat)
    {
        $nume_categorie = $row_cat['nume_categorie'];
    }
    ?>
<div class="container-fluid top-body-detail">
    <div class="container breadcrumb-top">
        <nav class="breadcrumbs">
            <a href="homepage_user.php" class="breadcrumbs__item">Pagina principala</a>
            <!-- <a href="#shop" class="breadcrumbs__item">Shop</a>
        <a href="#cart" class="breadcrumbs__item">Cart</a> -->
            <a href="#" class="breadcrumbs__item is-active">
                <?php echo ucfirst(strtolower($nume_categorie)); ?>
            </a>
        </nav>
    </div>
</div>

<?php
    // Selectarea tuturor produselor din categoria selectată
    $sql    = "SELECT * FROM produse p left join images i on p.id_produs=i.id_produs WHERE id_categorie= $id_categorie AND main_image=1";
    $result = mysqli_query($conn, $sql);
    // Afișarea produselor
    echo '<div class="container-fluid body-detail">
    <div class = "container">
    <div class="product-container">';
    $default_image_path = '/bookzone/admin/uploads/logo-bookzone-H.png';


    while ($row = mysqli_fetch_assoc($result))
    {

        // Obține informațiile despre produs
        $nume_produs      = $row['nume_produs'];
        $descriere_produs = $row['descriere_produs'];
        $pret_initial     = $row['pret'];
        $procent_reducere = $row['pret_redus'];
        $id_produs        = $row['id_produs'];
        $image            = $row['image'];
        $image_path       = '/bookzone/admin/uploads/' . $image;
        // Afișează imaginea produsului, daca exista va afisa imaginea produsului iar daca nu, se va afisa cea de default
        $afisare_imagine = ($row['image']) ? '<img src="' . $image_path . '">' : '<img src="' . $default_image_path . '">';

        $descriere_produs = $row['descriere_produs'] ? $descriere_produs : '';
        // Calculează prețul redus 
        $pret_redus = $pret_initial - ($pret_initial * $procent_reducere / 100);
        if ($procent_reducere > 0)
        {
            // Afișează prețul redus și prețul inițial
            $afisare_pret_redus   = '<p class="product-price-discounted">' . $pret_redus . ' <span class ="moneda">lei</span></p>';
            $afisare_pret_initial = '<p class="product-price-initial">' . $pret_initial . '<span class ="moneda">lei</span></p>';
            $afisare_procent      = '<div class="product-discount ">-' . $procent_reducere . '% </div>';
        }
        else
        {
            // Afișează doar prețul inițial
            $afisare_pret_initial = '<p class="product-price-initial1">' . $pret_initial . ' <span class ="moneda">lei</span></p>';
            $afisare_pret_redus   = '';
            $afisare_procent      = '';
        }
        // Afisează produsul cu toate informațiile sale
        echo '  
        <div class="product">
            <a href="detalii_produs.php?id_produs=' . $row['id_produs'] . '">
                <div class = "product-image">' . $afisare_imagine . '</div>
                <div>' . $afisare_procent . '</div>
                <div class ="titlu_produs"><h5>' . $nume_produs . '</h5></div>
                <div class = "afisare_pret">' . $afisare_pret_initial . $afisare_pret_redus . '</div>
            </a>
                <div class="product-cart">
                    <button class="btn btn-primary adauga-in-cos">Adauga in cos</button>
                </div>
        </div>';
    }
    echo '
    </div> </div></div>';
}
include 'footer.php';
?>