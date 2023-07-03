<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/includes/config.php';
$pagina = $_SERVER['REQUEST_URI'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Librarie</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/bookzone/view/includes/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="/bookzone/view/includes/stylesheet-galerie-imagini.css">
    <link rel="stylesheet" type="text/css" href="/bookzone/admin/includes/stylesheet-admin.css">
    <link rel="stylesheet" type="text/css" href="/bookzone/view/includes/stylesheet-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="homepage fw-nav nav-sticky">
        <div class="header top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="logo col-lg-2 col-md-2">
                        <a class="nav-link active" aria-current="page" href="homepage_user.php">
                            <img src="/bookzone/image/logo-bookzone-H.png" alt="Logo">
                        </a>
                    </div>
                    <div class="nav-search col-lg-6 col-md-6">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="button-search btn" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="user-cart col-lg-4 col-md-4">
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown my-account">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-user"></i> Contul meu
                                        </a>
                                        <ul class=" autentificare dropdown-menu">
                                            <li>
                                                <div class="account-title">
                                                    <img src="/bookzone/image/logo-bookzone-H.png" alt="Logo">
                                                </div>
                                            </li>
                                            <div class="box">
                                                <?php
                                                // Verifică dacă utilizatorul este conectat
                                                if (!isset($_SESSION['username']))
                                                {
                                                    // Afișează butonul de conectare
                                                    echo '
                                                        <li>
                                                            <a class="dropdown-item box-login" href="login.php"> Intra in cont </a>
                                                        </li>                                            
                                                        <li>
                                                            <a class="dropdown-item create-account" href="login.php">Nu ai cont? Creeaza unul aici.
                                                            </a>
                                                        </li>
                                                    ';
                                                }
                                                else
                                                {
                                                    // Afișează butonul de deconectare
                                                    echo '
                                                        <li>
                                                            <a class="dropdown-item box-login" href="logout.php"> Deconectare </a>
                                                        </li>
                                                        ';
                                                }
                                                ?>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown my-account">
                                        <a class="nav-link dropdown-toggle" href="cos.php" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-cart-shopping"></i> Cosul meu
                                        </a>
                                        <ul class="dropdown-menu">
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav menu-bar nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="homepage_user.php" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-bars"></i>Categorii de carti
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            // Selectam toate categoriile
                                            $sql    = "SELECT * FROM categorii";
                                            $result = mysqli_query($conn, $sql);

                                            // Verificare rezultat
                                            if (mysqli_num_rows($result) > 0)
                                            {
                                                // Afisare categorii pe pagina homepage
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="categorie.php?id_categorie=<?php echo $row['id_categorie']; ?>">
                                                    <?php echo ucfirst(strtolower($row['nume_categorie'])); ?>
                                                </a>
                                            </li>
                                            <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "Nu exista categorii disponibile";
                                            }

                                            ?>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" nav-link <?php echo (strpos($pagina, 'homepage') !== false ? 'active' : ''); ?>"
                                            href=" homepage_user.php">
                                            Acasa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo (strpos($pagina, 'top_carti') !== false ? 'active' : ''); ?>"
                                            href="top_carti.php">Top carti</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link <?php echo (strpos($pagina, 'promotii') !== false ? 'active' : ''); ?> "
                                            href="promotii.php">Promotii</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav menu-bar me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Aboneaza-te la newsletter</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (strpos($pagina, 'contact') !== false ? 'active' : ''); ?>"
                                                href="contact.php">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>