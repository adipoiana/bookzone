<?php
// Conectare la baza de date
include 'header_admin.php';

echo '
<div class="container">
        <div class="row">
            <div class="col-lg-10 add_admins lista_admins text-center">
            <h3>Lista Clienti</h3>
            </div>
        </div>
</div>
';
// Efectuare interogare la baza de date
$sql    = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Verificare dacă interogarea a returnat date
if (mysqli_num_rows($result) > 0)
{
  // Afisarea datelor in tabel
  echo "
  <div class='container space_edit_delete'>
  <table>
  <tr>
  <th>Id</th>
  <th>Nume</th>
  <th>Prenume</th>
  <th>Username</th>
  <th>Email</th>
  <th>Link-uri</th>
  </tr>
  ";

  while ($row = mysqli_fetch_assoc($result))
  {
    echo '
    <tr>
    <td> ' . $row["id_utilizator"] . '</td>
    <td> ' . $row["nume"] . '</td>
    <td> ' . $row["prenume"] . ' </td> 
    <td> ' . $row["username"] . ' </td>
    <td> ' . $row["email"] . ' </td>
    <td> 
    <a class="btn btn-sm btn-primary edit_delete" href= "vizualizare.php?id_utilizator=' . $row['id_utilizator'] . '"><i class="fa-regular fa-eye"></i></a>
    <a class="btn btn-sm btn-danger" href= "delete-utilizator.php?id_utilizator=' . $row['id_utilizator'] . '"><i class="fa-solid fa-trash-can"></i></a>
    </td>
    </tr>
    ';
  }
  echo "</table>
  </div>
  ";
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