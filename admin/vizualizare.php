<?php
include 'header_admin.php';

$id     = $_GET['id_utilizator'];
$sql    = "SELECT * FROM users WHERE id_utilizator = '$id'";
$result = mysqli_query($conn, $sql);

// parcurgeti rezultatete
if (mysqli_num_rows($result) > 0)
{
  $row = mysqli_fetch_assoc($result);
  // Afisarea datelor in tabel
  echo "
  <div class='container vizualizare_utilizatori p-4'>
    <table>
      <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Username</th>
        <th>Email</th>
      </tr>
      <tr>
        <td> " . $row['nume'] . " </td>
        <td> " . $row['prenume'] . " </td>
        <td> " . $row['username'] . "</td>
        <td> " . $row['email'] . " </td>
      </tr>
    </table>
  </div>
  ";

}
else
{
  echo "Nu s-au gasit utilizatori.";
}

?>

<?php
include 'footer.php';
?>