<?php
require 'header_admin.php';

echo '
<div class = "container">
    <div class = "row">
    <div class = "col-lg-8 text-center add_admins">
    <h3>Categorii</h3>
    </div>
    <div class = "col-lg-2 text-end add_admins">
    <a class ="btn btn-primary" href = "formular_adaugare_categorie.php">Inserare</a>
    </div>
    </div>
</div>
';
$sql    = "SELECT * FROM categorii";
$result = mysqli_query($conn, $sql);
//verificam daca interogarea a returnat date
if (mysqli_num_rows($result) > 0)
{

    //afisarea datelor in tabel
    echo '
    <div class="container space_edit_delete">
        <div class="row">
            <div class="col-lg-10">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nume categorie</th>
                        <th>Editare/Stergere</th>
                    </tr>
    ';
    while ($row = mysqli_fetch_assoc($result))
    {
        echo '
                    <tr>
                        <td>' . $row['id_categorie'] . '</td>
                        <td>' . $row['nume_categorie'] . '</td>
                        <a class ="btn btn-sm btn-primary edit_delete" href="formular_editare_categorii.php?id_categorie=' . $row['id_categorie'] . '"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class ="btn btn-sm btn-danger" href="delete_categorie.php?id_categorie=' . $row['id_categorie'] . '"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
    ';
    }
    echo '
                </table> 
            </div>
        </div>
    </div>
    ';
}
else
{
    echo ' Nu s-au gasit date despre categorii';
}
//inchiderea conexiunii la baza de date
mysqli_close($conn);
?>
<?php
require 'footer.php';
?>