<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Librarie</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/bookzone/admin/includes/stylesheet-admin.css">
    <link rel="stylesheet" type="text/css" href="/bookzone/view/includes/stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid" style="padding:0;">
        <div class="container">
        </div>
        <div class="nav-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav admin-bar">
                                        <li class="nav-item">
                                            <a class="nav-link" href="homepage_admin.php"> <i
                                                    class="fa-solid fa-house"></i>Acasa</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="utilizatori_clienti.php"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Utilizatori
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="utilizatori_clienti.php"> Clienti</a>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                        </li>
                                        <li><a class="dropdown-item" href="utilizatori_admin.php"> Admins</a></li>
                                    </ul>
                                    </li>
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="listare_categorii.php" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Categorii
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="listare_categorii.php">Listare</a></li>
                                            <hr>
                                            <li><a class="dropdown-item"
                                                    href="formular_adaugare_categorie.php">Adaugare</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="listare_produse.php" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Produse
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="listare_produse.php">Listare</a></li>
                                            <hr>
                                            <li><a class="dropdown-item"
                                                    href="formular_adaugare_produse.php">Adaugare</a></li>

                                        </ul>
                                    </div>
                                    <li class="nav-item">
                                        <a class="nav-link" href="lista_abonati.php">Lista abonati</a>
                                    </li>
                                    <li class="nav-item deconectare">
                                        <a class="nav-link" href="logout-admin.php">Deconectare</a>
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