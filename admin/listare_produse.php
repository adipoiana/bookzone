<?php
require 'header_admin.php';
echo '
<div class = "container">
    <div class = "row">
    <div class = "col-lg-10 text-center add_admins">
    <h3>Lista Produse</h3>
    </div>
    <div class = "col-lg-2 text-end add_admins">
    <a class ="btn btn-primary" href = "formular_adaugare_produse.php">Inserare</a>
    </div>
    </div>
</div>
';
//efectuam interogarea la baza de date
$sql    = "SELECT * FROM produse p LEFT JOIN categorii c on p.id_categorie=c.id_categorie
LEFT JOIN images i ON p.id_produs = i.id_produs AND i.main_image = 1";
$result = mysqli_query($conn, $sql);

//verificam daca a returnat rezultate
if (mysqli_num_rows($result) > 0)
{
    //afisarea datelor din tabel
    echo '
    <div class="container space_edit_delete">
    <div class="row">
    <div class="col-lg-12">
    <table>
    <tr>
    <th>ID Produs</th>
    <th> Nume Categorie</th>
    <th>Nume Produs</th>
    <th>Cantitate</th>
    <th>Pret</th>
    <th>Reduceri de pret</th>
    <th>UM</th>
    <th>status</th>
    <th>Imagini</th>
    <th>Editare/Stergere</th>
    </tr>
    ';
    while ($row = mysqli_fetch_assoc($result))
    {
        echo '
        <tr>
        <td> ' . $row['id_produs'] . ' </td>
        <td> ' . $row['nume_categorie'] . ' </td>
        <td> ' . $row['nume_produs'] . ' </td>
        <td> ' . $row['cantitate'] . ' </td>
        <td> ' . $row['pret'] . ' </td>
        <td> ' . $row['pret_redus'] . ' </td>
        <td> ' . $row['um'] . ' </td>
        <td> ' . ($row['status'] == 0 ? 'indisponibil' : 'disponibil') . ' </td>
        <td> ';
        if ($row['image'])
        {
            echo '<img src="/bookzone/admin/uploads/' . $row['image'] . '" alt="' . $row['name'] . '" style="width:100px; height:100px;">';
        }
        else
        {
            echo '';
        }
        echo '</td>
        <td> 
         <a class="btn btn-sm btn-primary edit_delete" href ="formular_editare_produse.php?id_produs=' . $row['id_produs'] . '"><i class="fa-solid fa-pen-to-square"></i></a>
         <a class="btn btn-sm btn-secondary edit_delete" href="/bookzone/view/detalii_produs.php?id_produs=' . $row['id_produs'] . '"><i class="fa-solid fa-eye"></i></a> 

         <a class="btn btn-sm btn-danger" href="delete_produse.php?id_produs=' . $row['id_produs'] . '" onclick="return confirm(\'Sunteti sigur ca vreti sa stergeti aceasta imagine?\')"><i class="fa-solid fa-trash-can"></i></a> 
         </td> 
        </tr>
        ';
    }

    echo '</table>
    

    </div>
    </div>
    </div>
    ';
}
else
{
    echo ' Nu exista produse adaugate';
}
?>

<?php
require 'footer.php';
?>