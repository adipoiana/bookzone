<?php
include 'header_admin.php';
$id     = $_GET['id_utilizator'];
$sql    = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  // Există cel puțin un rând returnat, deci putem afișa informațiile utilizatorului
  $row = mysqli_fetch_assoc($result);
  echo "Nume: " . $row["nume"] . "<br>";
  echo "Prenume: " . $row["prenume"] . "<br>";
  echo "Username: " . $row["username"] . "<br>";
  echo "Passwords: " . $row["password"] . "<br>";
  echo "Email: " . $row["email"] . "<br>";
}
else
{
  echo "Nu s-a găsit niciun utilizator cu acest ID.";
}

?>

<?php
include 'footer.php';
?>