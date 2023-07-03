<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/functions.php';
//verificam daca formularul a fost trimis
if (isset($_POST['submit']))
{
    //obtinerea datelor din formular
    $id_produs    = $_POST['id_produs'];
    $id_categorie = $_POST['id_categorie'];
    $np           = $_POST['nume_produs'];
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
    $status       = $_POST['status'];
    $top_carti    = $_POST['top_carti'];
    $homepage     = $_POST['homepage'];
    $main_image   = $_POST['main_image'];

    $slug_produse = slugify($np);


    $id_image = $_POST['id_image'];
    $image    = $_POST['image'];

    //preluam imaginea din formular pentru cazul in care s-a incarcat o noua imagine
    // Selectarea imaginilor asociate produsului

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




    //actualizarea datelor cu cele noi
    $sql    = "UPDATE produse SET id_categorie = '$id_categorie', nume_produs='$np', descriere_produs ='$descriere', 
                rezumat ='$rezumat', autor='$autor', editura ='$editura', nr_pagini = '$nr_pagini',
                cod_isbn = '$cod_isbn', cantitate ='$cant', pret ='$pret', pret_redus ='$pret_redus', um='$um', slug_prod ='$slug_produse', status ='$status', homepage = '$homepage', top_carti = '$top_carti' WHERE id_produs ='$id_produs'";
    $result = mysqli_query($conn, $sql);

    $sql_image = "UPDATE images SET id_produs = $id_produs, image = '$image', main_image = '$main_image' 
                WHERE id_image ='$id_image'";
    $result    = mysqli_query($conn, $sql_image);
    //executarea interogarii si verificatea ei
    if ($result)
    {
        echo "
                    <script> alert('Datele au fost actualizate cu succes')
                    window.location.href='/bookzone/admin/formular_editare_produse.php?id_produs=$id_produs';
                    </script>
                    ";
    }
    else
    {
        echo " Eroare la actualizare:" . mysqli_error($conn);
    }

}
?>