<?php
include 'header_user.php';

$sql    = "SELECT * FROM produse p LEFT JOIN images i ON p.id_produs = i.id_produs WHERE p.pret_redus > 0 and i.main_image =1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0)
{
    ?>
<div class="container-fluid body-detail">
    <div class="container breadcrumb-top">
        <nav class="breadcrumbs">
            <a href="homepage_user.php" class="breadcrumbs__item">Pagina principala</a>
            <!-- <a href="#shop" class="breadcrumbs__item">Shop</a>
        <a href="#cart" class="breadcrumbs__item">Cart</a> -->
            <a href="#checkout" class="breadcrumbs__item is-active">Promotii</a>
        </nav>
    </div>
    <div class="container">
        <div class="product-container">
            <?php
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
                    ?>
            <div class="product">
                <a href="detalii_produs.php?id_produs=<?php echo $row['id_produs']; ?>">
                    <div class="product-image">
                        <?php echo $afisare_imagine; ?>
                    </div>
                    <div>
                        <?php echo $afisare_procent; ?>
                    </div>
                    <div class="titlu_produs">
                        <h5>
                            <?php echo $nume_produs; ?>
                        </h5>
                    </div>
                    <div class="afisare_pret">
                        <?php echo $afisare_pret_initial; ?>
                        <?php echo $afisare_pret_redus; ?>
                    </div>
                </a>
                <div class="product-cart">
                    <button class="btn btn-primary adauga-in-cos">Adauga in cos</button>
                </div>
            </div>
            <?php
                }
                ?>

        </div>
    </div>
</div>
</div>
<?php
}
else
{
    echo 'Nu există produse la reducere.';
}
?>
<?php
include 'footer.php';
?>