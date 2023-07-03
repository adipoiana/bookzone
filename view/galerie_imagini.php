<?php
include 'header_user.php';

$sql    = 'SELECT * FROM produse';
$result = mysqli_query($conn, $sql);

// afisam fiecare produs si linkul catre pagina de detalii
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='produs'>";
    echo "<h2><a href='detalii_produs.php?id=".$row['id_produs']."'>".$row['nume_produs']."</a></h2>";
    echo "<p>".$row['descriere']."</p>";
    echo "</div>";
  }
?>