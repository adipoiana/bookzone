<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/functions.php';
//verificam daca a fost trimis formularul
if (isset($_POST['submit']))
{
    //obtinerea datelor din formular
    $id             = $_POST['id_categorie'];
    $nume_cat       = $_POST['nume_categorie'];
    $slug_categorie = slugify($nume_cat);
    //Actualizarea datelor cu cele noi
    $sql    = "UPDATE categorii SET nume_categorie='$nume_cat', slug_cat='$slug_categorie' WHERE id_categorie='$id'";
    $result = mysqli_query($conn, $sql);
    //executarea interogarii si verificarea ei
    if ($result)
        echo "
    <script> alert ('Datele au fost actualizarte cu succes')
    window.location.href='/bookzone/admin/listare_categorii.php';
    </script>
    ";
}
else
{
    echo "Eroare la actualizare:" . mysqli_error($conn);
}
mysqli_close($conn);
?>