<?php
require 'header_admin.php';

// preluarea ID-urilor imaginii și produsului din URL
$id_image  = $_GET['id_image'];
$id_produs = $_GET['id_produs'];

// selectarea imaginii din baza de date
$sql    = "SELECT image FROM images WHERE id_image='$id_image' AND id_produs='$id_produs'";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);

// ștergerea imaginii din folderul de încărcare
$image_path = "uploads/" . $row['image'];
unlink($image_path);

// ștergerea imaginii din baza de date
$sql_delete    = "DELETE FROM images WHERE id_image='$id_image'";
$result_delete = mysqli_query($conn, $sql_delete);

// verificarea rezultatului ștergerii imaginii
if ($result_delete)
{
    echo "
        <script>
        alert('Imaginea a fost ștearsă cu succes');
        location.href='/bookzone/admin/formular_editare_produse.php?id_produs=$id_produs';
        </script>
        ";
}
else
{
    echo "Eroare la ștergerea imaginii: " . mysqli_error($conn);
}
?>