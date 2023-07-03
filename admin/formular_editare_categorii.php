<?php
require 'header_admin.php';
//se verifica daca exista id-ul in baza de date
$id = $_GET['id_categorie'];
//se construieste interogarea
$sql    = "SELECT * FROM categorii WHERE id_categorie=$id";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);
// daca exista rezultate vom afisa formularul de editare cu datele acesteia iar daca nu sa ne afiseze un mesaj de eroare
if (mysqli_num_rows($result) > 0)
{
    echo '
    <div class="container">
        <div class="row label_edit">
            <div class="col-lg-4 space_top_form adaugare_administrator">
            <form method="post" action = "editare_categorii.php">
                <input type="hidden" class="form-control" name="id_categorie" value="' . $row['id_categorie'] . '"><br>
                <label for="nume_categorie_categorie">Nume Categorie</label>
                <input type="text" class="form-control" name="nume_categorie" value="' . $row['nume_categorie'] . '"><br>
                <input type="submit" class="btn btn-primary" name="submit" value ="Actualizeaza">
            </form>
            </div>
        </div>
    </div>
    ';
}
else
{
    echo "Nu s-a gasit id_ul in baza de date";
}

?>

<?php
require 'footer.php';
?>