<?php
require 'header_admin.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/functions.php';
//se verifica daca s-a trimis formularul si se face inserare in baza de date
if (isset($_POST['submit']))
{
    $nume_cat       = $_POST['nume_categorie'];
    $slug_categorie = slugify($nume_cat);

    $sql    = "INSERT INTO categorii (nume_categorie, slug_cat) VALUES ('$nume_cat', '$slug_categorie')";
    $result = mysqli_query($conn, $sql);

    //se verifica daca inserarea a avut succes
    if ($result)
    {
        echo " <script> alert ('A fost adaugat cu succes')
        window.location.href='/bookzone/admin/listare_categorii.php';
        </script>
        ";
    }
    else
    {
        echo "Eroare la adăugarea produsului: " . mysqli_error($conn);
    }
}

$conn->close();
?>