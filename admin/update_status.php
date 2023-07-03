<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';


// Preia starea produsului din formular
$status    = $_POST["status"];
$id_produs = $_POST["id_produs"];


// Actualizează starea produsului în tabela "produse"
$sql    = "UPDATE produse SET status = '$status' WHERE id_produs = '$id_produs'";
$result = mysqli_query($conn, $sql);
if ($result)
{
    echo "<script> alert('Starea produsului a fost actualizata cu succes')
    window.location.href ='/bookzone/admin/listare_produse.php';
    </script>";
}
else
{
    echo "Eroare la actualizarea stării produsului: " . mysqli_error($conn);
}

// Închide conexiunea
$conn->close();
?>