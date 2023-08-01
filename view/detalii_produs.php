<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/header_user.php';
?>
<?php
// Verifica daca s-a dat ID pentru produsul selectat
if (isset($_GET['id_produs']))
{
    // Obținerea ID-ului produsului selectat
    $id_produs = $_GET['id_produs'];

    // Selectarea informațiilor despre produsul selectat
    $sql    = "SELECT * FROM produse p left join images i on p.id_produs = i.id_produs WHERE p.id_produs = $id_produs";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);

    // Obține informațiile despre produs
    $main_image       = $row['main_image'];
    $nume_produs      = $row['nume_produs'];
    $descriere_produs = $row['descriere_produs'];
    $description      = $row['rezumat'];
    $autor            = $row['autor'];
    $cod_isbn         = $row['cod_isbn'];
    $nr_pagini        = $row['nr_pagini'];
    $editura          = $row['editura'];
    $pret_initial     = $row['pret'];
    $procent_reducere = $row['pret_redus'];
    $id_produs        = $row['id_produs'];
    $image            = $row['image'];
    // Afișează imaginea produsului, daca exista va afisa imaginea produsului iar daca nu, se va afisa cea de default
    $image_path      = '/bookzone/admin/uploads/' . $row['image'];
    $afisare_imagine = '<img src="' . $image_path . '">';


    // Calculează prețul redus 
    $pret_redus = $pret_initial - ($pret_initial * $procent_reducere / 100);
    if ($procent_reducere > 0)
    {
        // Afișează prețul redus și prețul inițial
        $afisare_pret_redus   = '<p class="product-price-discounted">' . $pret_redus . ' <span class ="moneda">lei</span></p>';
        $afisare_pret_initial = '<p class="product-price-initial">' . $pret_initial . '<span class ="moneda">lei</span></p>';
        $afisare_procent      = '<div class="product-discount-detail ">-' . $procent_reducere . '% </div>';
    }
    else
    {
        // Afișează doar prețul inițial
        $afisare_pret_initial = '<p class="product-price-initial1">' . $pret_initial . ' <span class ="moneda">lei</span></p>';
        $afisare_pret_redus   = '';
        $afisare_procent      = '';
    }

}
// Afisează produsul cu toate informațiile sale
?>
<?php
$id_categorie = $row['id_categorie'];
$sql_cat      = "SELECT * FROM categorii WHERE id_categorie = $id_categorie";
$result       = mysqli_query($conn, $sql_cat);
if ($row_cat = mysqli_fetch_assoc($result))
{
    $nume_categorie = $row_cat['nume_categorie'];
}
?>
<div class="complete-body">
    <div class="container-fluid top-body-detail">
        <div class="container breadcrumb-top">
            <nav class="breadcrumbs">
                <a href="homepage_user.php" class="breadcrumbs__item">Pagina principala</a>
                <a href="categorie.php?id_categorie=<?php echo $id_categorie; ?>" class="breadcrumbs__item">
                    <?php echo ucfirst(strtolower($nume_categorie)); ?>
                </a>
                <a href="#" class="breadcrumbs__item is-active">
                    <?php echo $nume_produs; ?>
                </a>
            </nav>
        </div>
    </div>
    <div class="container-fluid body-detail">
        <div class="container">
            <div class="row">
                <div class="product-detail col-lg-4">
                    <div class=" detail">
                        <div class="mpgal" data-mpgal="thumb_width:80, thumb_height:50">
                            <?php
                            $id_produs     = $_GET['id_produs'];
                            $image_path    = '/bookzone/admin/uploads/';
                            $sql_images    = "SELECT * FROM images WHERE id_produs = $id_produs AND (main_image = 1 OR main_image =0)";
                            $result_images = mysqli_query($conn, $sql_images);

                            if ($result_images && mysqli_num_rows($result_images) > 0)
                            {
                                $first_image = true;
                                while ($row_image = mysqli_fetch_assoc($result_images))
                                {
                                    $galerie_imagini = $image_path . $row_image['image'];
                                    $active_class    = $first_image ? "active" : "";
                                    echo "
                                    <img src='$galerie_imagini' width='640' height='480'  />
                                    ";
                                    $first_image = false;
                                }
                            }
                            else
                            {
                                echo "Nu există imagini disponibile pentru acest produs.";
                            }

                            ?>

                        </div>
                        <div>
                            <?php echo $afisare_procent; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center describe-product">
                    <div class="descriere-produs">
                        <div class="titlu_produs">
                            <h3>
                                <?php echo $nume_produs; ?>
                            </h3>

                            <p>
                                <?php echo $descriere_produs; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center price-cart">
                    <form action="" method="post">
                        <div class="afisare_pret">
                            <p>Pret: <span class="spatiu-gol"><?php echo $afisare_pret_initial . $afisare_pret_redus; ?></span>
                            </p>
                        </div>
                        <div class="product-cart">
                            <input type="hidden" name="id_produs" value="<?php echo $id_produs; ?>">
                            <button type="submit" class="btn btn-primary detalii-cart">Adauga in cos</button>
                        </div>
                    </form>
                    <div class="contact-detail">
                        <div class="comanda-telefonica"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <p>Comanda prin telefon <br>
                                0876453212</p>
                        </div>
                        <div><span>L-V <br>09:30 - 17:30 </span>
                        </div>
                    </div>
                    <hr class="underline-livrare">
                    <div class="livrare">
                        <div class="truck"><i class="fa-solid fa-truck"></i></div>
                        <div>
                            <p>Livrare în România</p>
                            <span>1-3 zile lucrătoare</span>
                        </div>
                    </div>
                    <hr class="underline-livrare">
                    <div class="ridicare-easybox">
                        <div><img src="/bookzone/image/easybox.jpg"> </div>
                        <div>
                            <p>Ridicare din Easybox </p>
                            <span>1-3 zile lucrătoare</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $id_categorie = $row['id_categorie'];
    $sql_cat      = "SELECT * FROM categorii WHERE id_categorie = $id_categorie";
    $result       = mysqli_query($conn, $sql_cat);
    if ($row_cat = mysqli_fetch_assoc($result))
    {
        $nume_categorie = $row_cat['nume_categorie'];
    }
    ?>

    <div class="container-fluid tab-container">
        <div class="container">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description"
                        type="button" role="tab" aria-controls="description" aria-selected="true">Descriere</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                        data-bs-target="#specifications" type="button" role="tab" aria-controls="specifications"
                        aria-selected="false">Specificații</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="container content-container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <?php
                if ($description)
                {
                    ?>
                    <div class="product-description">

                        <h4>Rezumat
                            <?php echo $nume_produs; ?> <span>-</span>
                            <?php echo $autor; ?>
                        </h4>
                        <p class="short-description">
                            <?php echo substr($description, 0, 360); ?>
                        </p>
                        <p class="full-description" style="display: none;">
                            <?php echo $description; ?>
                        </p>
                        <a href="#" class="read-more"><span class="text">Citeste mai mult</span> <span
                                class="arrow"></span></a>
                    </div>
                    <?php
                }
                else
                {
                    echo '';
                }
                ?>


            </div>
            <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Categorie</th>
                            <td>
                                <span class="fl">
                                    <?php echo $nume_categorie; ?>
                                </span>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">Autor</th>
                            <td>
                                <?php echo $autor; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Codul ISBN</th>
                            <td>
                                <?php echo $cod_isbn; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Editura</th>
                            <td>
                                <?php echo $editura; ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Numarul de pagini</th>
                            <td>
                                <?php echo $nr_pagini; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>