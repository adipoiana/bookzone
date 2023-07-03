<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';

//verifica daca este setat parametrul "id_produs" in link-ul de stergere
if (isset($_GET['id_produs']))
{
    //definim id-ul ce urmeaza a fi sters
    $id = $_GET['id_produs'];

    //construim interogarea SQL
    $sql    = "DELETE FROM produse WHERE id_produs=$id";
    $result = mysqli_query($conn, $sql);

    //executarea interogarii si verificarea ei
    if ($result)
    {
        echo "<script> alert ('A fost sters cu succes')
      window.location.href ='/bookzone/admin/listare_produse.php';
      </script>";
    }
    else
    {
        echo "Eroare in stergerea produselor:" . mysqli_error($conn);
    }
}
else
{
    echo "Nu s-a specificat id-ul produsului de sters.";
}
?>