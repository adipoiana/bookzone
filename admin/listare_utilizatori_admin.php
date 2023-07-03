<!-- <?php
// Conectare la baza de date
include 'header_admin.php';
$id = $_POST['id_admins'];
// Efectuare interogare la baza de date
$sql    = "SELECT * FROM admins WHERE id_admins = '$id'";
$result = mysqli_query($conn, $sql);

// Verificare dacă interogarea a returnat date
if (mysqli_num_rows($result) > 0)
{
  // Afisarea datelor in tabel
  echo "
  <table>
  <tr>
  <th>Id</th>
  <th>Username</th>
  <th>Password</th>
  <th>Email</th>
  </tr>
  ";

  while ($row = mysqli_fetch_assoc($result))
  {
    echo "
    <tr>
    <td> " . $row['id_admins'] . "</td>
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
  echo "Nu s-au gasit administratori.";
}


// Închidere conexiune la baza de date
mysqli_close($conn);
?> -->