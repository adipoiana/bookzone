<?php
// Conectare la baza de date
include 'header_admin.php';
$id = $_POST['id_utilizator'];
// Efectuare interogare la baza de date
$sql    = "SELECT * FROM users WHERE id_utilizator = '$id'";
$result = mysqli_query($conn, $sql);

// Verificare dacă interogarea a returnat date
if (mysqli_num_rows($result) > 0)
{
  // Afisarea datelor in tabel
  echo "
  <table>
  <tr>
  <th>Id</th>
  <th>Nume</th>
  <th>Prenume</th>
  <th>Username</th>
  <th>Password</th>
  <th>Email</th>
  </tr>
  ";

  while ($row = mysqli_fetch_assoc($result))
  {
    echo "
    <tr>
    <td> " . $row['id_utilizator'] . "</td>
    <td> " . $row['nume'] . "</td>
    <td> " . $row['prenume'] . " </td> 
    <td> " . $row['username'] . " </td>
    <td> " . $row['password'] . " </td>
    <td> " . $row['email'] . " </td>
    </tr>
    ";
  }
  echo "</table>";
}
else
{
  echo "Nu s-au gasit utilizatori.";
}


// Închidere conexiune la baza de date
mysqli_close($conn);
?>
<?php
include 'footer.php';
?>