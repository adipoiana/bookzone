<?php
// Verificați dacă există o cerere POST
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Preluare ID produs din cererea POST
    $id_produs = $_POST['id_produs'];
    $sql       = "SELECT * FROM produse p LEFT JOIN images i ON p.id_produs = i.id_produs WHERE p.id_produs = $id_produs";
    $result    = mysqli_query($conn, $sql);
    $row       = mysqli_fetch_assoc($result);

    // Verificați dacă sesiunea coșului există și, dacă nu, inițializați-o
    if (!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = array();
    }

    // Verificați dacă produsul există deja în coș
    if (isset($_SESSION['cart'][$id_produs]))
    {
        // Dacă produsul există deja, incrementați cantitatea
        $_SESSION['cart'][$id_produs]['cantitate']++;
    }
    else
    {
        // Dacă produsul nu există în coș, adăugați-l cu cantitatea inițială de 1
        $_SESSION['cart'][$id_produs] = array(
            'id_produs'   => $id_produs,
            'nume_produs' => $row['nume_produs'],
            'pret_redus'  => $row['pret_redus'],
            'cantitate'   => 1,
            'image_path'  => $row['image']
        );
    }


}
?>