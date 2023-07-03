<?php
require 'header_admin.php';


//se verifica existenta id_ului in baza de date
$id = $_GET['id_produs'];
// se construieste interogarea
$sql    = "SELECT * FROM produse p left join images i on p.id_produs = i.id_produs WHERE p.id_produs=$id";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);

//daca exista rezulate vom afisa un formular de editare cu datele acesteia
if (mysqli_num_rows($result) > 0)
{
    echo "
    <div class='container'>
    <div class='row label_edit'>
    <div class='col-lg-6 space_top_form adaugare_administrator'>
    <form method='POST' action='editare_produse.php' enctype='multipart/form-data'> ";
    echo "
    <div class = 'row mb-3 mt-3'>
    <label for='nume_categorie' class = 'col-lg-3'> Nume Categorie </label>
    <div class = 'col-lg-9'>
    
    <select class='form-select' name='id_categorie' aria-label='Default select example'class = 'col-lg-3' >";

    //Interogarea select pentru a prelua categoriile din baza de date
    $sql_categorii    = 'SELECT * FROM categorii';
    $result_categorii = mysqli_query($conn, $sql_categorii);
    //Parcurge fiecare rand din rezultat si afiseaza o optiune pentru fiecare categorie
    while ($row_categorie = mysqli_fetch_assoc($result_categorii))
    {
        echo "<option value = '" . $row_categorie['id_categorie'] . "' " . ($row['id_categorie'] == $row_categorie['id_categorie'] ? 'selected' : '') . ">" . $row_categorie['nume_categorie'] . "</option>";
    }
    echo "</select>
    </div>
    <input type='hidden' class = 'form-control' name='id_produs' value=' " . $row['id_produs'] . "'>
    </div>
    <div class = 'row mb-3 mt-3'>
    <label for='nume_produs' class = 'col-lg-3'> Nume Produs </label>
    <div class = 'col-lg-9'>
    <input type='text'  class = 'form-control' name='nume_produs' value=' " . $row['nume_produs'] . "'>
    </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='descriere_produs' class = 'col-lg-3'> Descriere </label>
            <div class = 'col-lg-9'>
                <textarea  class = 'form-control' name='descriere_produs'>" . $row['descriere_produs'] . "</textarea>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='rezumat' class = 'col-lg-3'> Rezumat </label>
            <div class = 'col-lg-9'>
            <textarea  class = 'form-control' name='rezumat'>" . $row['rezumat'] . "</textarea>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='autor' class = 'col-lg-3'> Autor </label>
            <div class = 'col-lg-9'>
                <input type='text' class = 'form-control' name='autor' value=' " . $row['autor'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='editura' class = 'col-lg-3'> Editura </label>
            <div class = 'col-lg-9'>
                <input type='text' class = 'form-control' name='editura' value=' " . $row['editura'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='nr_pagini' class = 'col-lg-3'> Numar pagini </label>
            <div class = 'col-lg-9'>
                <input type='decimal' class = 'form-control' name='nr_pagini' value=' " . $row['nr_pagini'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='cod_isbn' class = 'col-lg-3'> ISBN </label>
            <div class = 'col-lg-9'>
                <input type='text' class = 'form-control' name='cod_isbn' value=' " . $row['cod_isbn'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='cantitate' class = 'col-lg-3'> Cantitate </label>
            <div class = 'col-lg-9'>
                <input type='decimal' class = 'form-control' name='cantitate' value=' " . $row['cantitate'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='pret' class = 'col-lg-3'> Pret </label>
            <div class = 'col-lg-9'>
                <input type='decimal'  class = 'form-control' name='pret' min ='0' value=' " . $row['pret'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='pret_redus' class = 'col-lg-3'> Pret Redus </label>
            <div class = 'col-lg-9'>
                <input type='decimal'  class = 'form-control' name='pret_redus' value=' " . $row['pret_redus'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='um' class = 'col-lg-3'> UM </label>
            <div class = 'col-lg-9'>
                <input type='text'  class = 'form-control' name='um' value=' " . $row['um'] . "'>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='status' class = 'col-lg-3'>Status </label>
            <div class = 'col-lg-9'>
                <input type='radio' name='status' value='1' " . ($row['status'] == 1 ? 'checked' : '') . ">Disponibil
                <input type='radio' style ='margin-left:50px;' name='status' value='0' " . ($row['status'] == 0 ? 'checked' : '') . ">Indisponibil 
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='image' class='form-label col-lg-3'>Alege imagini -></label>
            <div class = 'col-lg-9'>
                <input type='file' class='form-control ' name='image[]' multiple>
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='main_image' class='form-label col-lg-3'>Alege -></label>
            <div class = 'col-lg-9'>
                 <input type='radio' name='main_image' value='1' " . ($row['main_image'] == 1 ? 'checked' : '') . " >Imagini principale
                 <input type='radio' name='main_image' value='0' " . ($row['main_image'] == 0 ? 'checked' : '') . ">Imagini aditionale 
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='status' class = 'col-lg-3'>Homepage</label>
            <div class = 'col-lg-9'>
                <input type='radio' name='homepage' value='1' " . ($row['homepage'] == 1 ? 'checked' : '') . ">Afisare Homepage
                <input type='radio' style ='margin-left:50px;' name='homepage' value='0' " . ($row['homepage'] == 0 ? 'checked' : '') . ">NU
            </div>
    </div>
    <div class = 'row mb-3 mt-3'>
        <label for='status' class = 'col-lg-3'>Top carti</label>
            <div class = 'col-lg-9'>
                <input type='radio' name='top_carti' value='1' " . ($row['top_carti'] == 1 ? 'checked' : '') . ">Top carti 
                <input type='radio' style ='margin-left:50px;' name='top_carti' value='0' " . ($row['top_carti'] == 0 ? 'checked' : '') . ">NU
            </div>
    </div>

    <div class = 'row mb-3 mt-3'>
        <div class = 'col-lg-3'>
            <input type='submit' class = 'btn btn-primary'  name='submit' value='Actualizeaza'>
        </div>
    </div>
</form>


</div>
<div class=' row col-lg-6' style='display: flex;'>";
    // Afiseaza imagini existente in baza de date
    $image_path    = '/bookzone/admin/uploads/';
    $sql_images    = "SELECT * FROM images WHERE id_produs = $id";
    $result_images = mysqli_query($conn, $sql_images);

    while ($row_image = mysqli_fetch_assoc($result_images))
    {
        echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb'>
        <img src='" . $image_path . $row_image['image'] . "' class='img-thumbnail' width='150' height='150'>
        <a href='sterge_imagine.php?id_image=" . $row_image['id_image'] . "&id_produs=" . $id
            . "' class='btn btn-danger btn-sm' onclick='return confirm(\" Sunteti sigur ca vreti sa stergeti aceasta
            imagine?\")'>Sterge</a>
    </div>";
    }

    echo "
</div>
</div>
</div>
";
}
else
{
    echo " Nu s-au gasit produse cu id-ul specificat";
}
?>


<?php
require 'footer.php';
?>