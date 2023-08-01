<?php
include 'header_admin.php';

$id     = $_GET['id'];
$sql    = "DELETE FROM subscribers WHERE id=$id";
$result = mysqli_query($conn, $sql);
if ($result)
{
    echo '
    <script>alert("Abonatul a fost sters cu succes")
    window.location.href="/bookzone/admin/lista_abonati.php";
    </script>
    ';
}
?>