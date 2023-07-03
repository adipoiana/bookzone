<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';

//definim variabila ce urmeaza a fi stearsa
$id = $_GET['id_categorie'];

//construim interogarea SQL
$sql    = "DELETE FROM categorii WHERE id_categorie = $id";
$result = mysqli_query($conn, $sql);

//executam interogarea si verificam daca s-au trimis cu succes sau nu
if ($result)
{
    echo " <script>alert ('Produsul a fost sters cu succes')
    window.location.href = '/bookzone/admin/listare_categorii.php';
    </script>";

}
else
{
    echo "Eroarea la stergerea produselor:" . mysqli_error($conn);
}

//inchiderea conexiunii la baza de date
mysqli_close($conn);

?>