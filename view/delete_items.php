<?php
include 'header_user.php';

//verifica daca este setat parametrul "id_produs" in link-ul de stergere
if (isset($_GET['id_produs']))
{
    //definim id-ul ce urmeaza a fi sters
    $id_produs = $_GET['id_produs'];




    // Șterge produsul din coș
    foreach ($_SESSION['cart'] as $key => $product)
    {
        $product['id_produs'] . " --- " . $id_produs . "<br>";
        if ($product['id_produs'] == $id_produs)
        {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Reindexează cheile array-ului de coș
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Actualizează numărul de produse din coș
    $num_items = count($_SESSION['cart']);

    echo "<script> alert ('A fost sters cu succes');
        window.location.href ='/bookzone/view/my_cart.php';
    </script>";

}
else
{
    echo "Nu s-a specificat id-ul produsului de sters.";
}
?>