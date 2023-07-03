<?php
require 'header_admin.php';
require '/xampp1/htdocs/bookzone/admin/includes/functions.php';
//se verifica daca s-a trimis un formular de adaugare si inserare a produselor si a imaginilor in baza de date
if (isset($_POST['submit']))
{

    //preluam datele din tabela produse din formular
    $nume_produs  = $_POST['nume_produs'];
    $descriere    = $_POST['descriere_produs'];
    $rezumat      = $_POST['rezumat'];
    $autor        = $_POST['autor'];
    $editura      = $_POST['editura'];
    $nr_pagini    = $_POST['nr_pagini'];
    $cod_isbn     = $_POST['cod_isbn'];
    $cant         = $_POST['cantitate'];
    $pret         = $_POST['pret'];
    $pret_redus   = $_POST['pret_redus'];
    $um           = $_POST['um'];
    $id_categorie = $_POST['id_categorie'];
    $slug_produs  = slugify($nume_produs);


    $image      = $_FILES['image']['name'];
    $main_image = $_POST['main_image'];

    //inserarea si trimterea comenzii in baza de date
    $sql_produse    = "INSERT INTO produse (id_categorie, nume_produs, descriere_produs, rezumat, autor, editura, nr_pagini, cod_isbn, cantitate, pret, pret_redus, um, slug_prod) VALUES ('$id_categorie', '$nume_produs', '$descriere', '$rezumat', '$autor', '$editura', '$nr_pagini', '$cod_isbn', '$cant', '$pret', '$pret_redus', '$um', '$slug_produs')";
    $result_produse = mysqli_query($conn, $sql_produse);



    //preluam id_ul produsului inserat
    $id_produs = mysqli_insert_id($conn);
    //Preluam imaginea din formular
    $imagini_incarcate = array();
    if (!empty(array_filter($_FILES['image']['name'])))
    {
        foreach ($_FILES['image']['name'] as $key => $image)
        {
            $temp_image = $_FILES['image']['tmp_name'][$key];
            $image_path = "uploads/" . $image;
            move_uploaded_file($temp_image, $image_path);
            $imagini_incarcate[] = $image; // Adăugăm imaginea în array
        }
        foreach ($imagini_incarcate as $imagine)
        {
            // Verificați dacă această imagine este imaginea principală selectată
            $sql_image    = "INSERT INTO images (id_produs, image, main_image) VALUES ('$id_produs', '$imagine', '$main_image')";
            $result_image = mysqli_query($conn, $sql_image);
        }
    }

    // foreach ($_FILES['image']['name'] as $key => $image)
    // {
    //     $temp_image = $_FILES['image']['tmp_name'][$key];
    //     $image_path = "uploads/" . $image;
    //     move_uploaded_file($temp_image, $image_path);
    //     // Verificați dacă indexul este mai mare decât limita de imagini
    //     if ($key >= $limita_imagini)
    //     {
    //         continue; // Sari peste imagini dacă depășesc limita
    //     }
    //     // Adaugam imaginea in baza de date
    //     $sql_image    = "INSERT INTO images (id_produs, image) VALUES ('$id_produs', '$image')";
    //     $result_image = mysqli_query($conn, $sql_image);


    // }
    //se verifica daca inserarea a avut loc cu succes
    // Verificarea rezultatelor
    if ($result_produse)
    {
        echo '
            <script>
                alert("Produsul și imaginile au fost adăugate cu succes");
                window.location.href = "/bookzone/admin/listare_produse.php";
            </script>
        ';
    }
    else
    {
        echo 'Eroare la adăugarea produsului sau la încărcarea imaginilor: ' . mysqli_error($conn);
    }
}
?>