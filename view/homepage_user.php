<?php
require 'header_user.php';
?>
<div class="container-fluid complete-body">
    <div class="container contact">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center ">

                <div class="progress-bar">
                    <div class="progress-bar-value"></div>
                </div>

                <div class="col-lg-2"></div>
            </div>
        </div>
        <div class="row">
            <h6 class="titlu-contact">Transport GRATUIT la comenzi de peste 150 de lei!</h6>
        </div>
    </div>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>

            </div>

            <div class="carousel-inner">
                <a href="detalii_produs.php?id_produs=114" class="carousel-item active">
                    <img src="/bookzone/image/slide-2.jpg" class="d-block w-100" alt="...">
                </a>
                <div class="carousel-item">
                    <img src="/bookzone/image/slide-iubire.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/bookzone/image/slide-apa.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon slide-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon slide-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <?php
    // Selectarea tuturor produselor din categoria selectată
    $sql    = "SELECT * FROM produse p left join images i on p.id_produs=i.id_produs WHERE p.homepage =1 AND i.main_image=1";
    $result = mysqli_query($conn, $sql);
    // Afișarea produselor
    ?>
    <div class="container-fluid body-detail">
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
                            <div class=" product-image">
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
require 'footer.php';
?>