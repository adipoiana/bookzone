<?php
include 'header_admin.php';

echo '
<div class="container">
        <div class="row">
            <div class="col-lg-10 add_admins lista_admins text-center">
            <h3>Lista administratori</h3>
            </div>
            <div class="col-lg-2 add_admins text-end">
                <a href="formular_add_admin.php" class="btn btn-primary" >Inserare</a>
            </div>
        </div>
</div>
';
// efectuare interogare la baza de date
$sql    = "SELECT * FROM admins";
$result = mysqli_query($conn, $sql);
// se verifica daca interogare la baza de date a returnat rezultate
if (mysqli_num_rows($result) > 0)
{
    echo '
    <div class="container space_edit_delete">

<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Email</th>
<th>Link-uri</th>
</tr> 
</div>
';

    while ($row = mysqli_fetch_assoc($result))
    {
        echo '
<tr>
<td> ' . $row["id_admin"] . ' </td>
<td> ' . $row["username_admin"] . ' </td>
<td> ' . $row["email_admin"] . ' </td>
<td> 
<a class = "btn btn-sm btn-primary edit_delete"  href = "update_formular.php?id_admin=' . $row["id_admin"] . '" ><i class="fa-solid fa-pen-to-square"></i>  </a>
<a class = "btn btn-sm btn-danger" href = "delete-admin.php?id_admin=' . $row["id_admin"] . '" ><i class="fa-solid fa-trash"></i>
</a>
</td>
</tr>
';
    }
    echo '</table>';
}
else
{
    echo 'nu s-au gasit administratori';
}
mysqli_close($conn);
?>
<?php
require 'footer.php';
?>