<?php
require 'header_admin.php';
// Obțineți detaliile utilizatorului cu ID-ul specificat în parametrul URL-ului
$id     = $_GET["id_admin"];
$sql    = "SELECT id_admin, username_admin, password_admin, email_admin FROM admins WHERE id_admin=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    // Afisați un formular de editare a utilizatorului cu detaliile acestuia
    $row = $result->fetch_assoc();
    echo "<form method='POST' action='editare_admin.php'>";
    echo "<input type='hidden' name='id_admin' value='" . $row["id_admin"] . "'>";
    echo "<input type='text' name='username_admin' value='" . $row["username_admin"] . "'><br>";
    echo "<input type='password' name='password_admin' value='" . $row["password_admin"] . "'><br>";
    echo "<input type='text' name='email_admin' value='" . $row["email_admin"] . "'><br>";
    echo "<input type='submit' value='Actualizează'>";
    echo "</form>";
}
else
{
    echo "Nu s-a găsit niciun utilizator cu ID-ul specificat.";
}
?>