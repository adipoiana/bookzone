<?php
require 'header_admin.php';

?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 space_top_form adaugare_administrator">
            <form method="POST" action="adaugare_produse.php" enctype="multipart/form-data">
                <select class="form-select" name="id_categorie" aria-label="Default select example">
                    <?php
                    //Interogarea SELECT pentru a prelua categoriile din baza de date
                    $sql    = "SELECT * FROM categorii";
                    $result = mysqli_query($conn, $sql);

                    //Parcurge fiecare rand din rezultat si afiseaza o optiune pentru fiecare categorie
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['id_categorie'] . '"> ' . $row['nume_categorie'] . '</option>';
                    }
                    ?>
                </select>
                <input type="text" class="form-control" style="margin-bottom: 10px;" name="nume_produs"
                    placeholder="Nume Produs">
                <textarea class="form-control" name="descriere_produs" placeholder="Descriere pe scurt"></textarea>
                <textarea class="form-control" name="rezumat" placeholder="Rezumat"></textarea>
                <input type="text" class="form-control" name="autor" placeholder="Autor">
                <input type="text" class="form-control" name="editura" placeholder="Editura">
                <input type="decimal" class="form-control" name="nr_pagini" placeholder="Numar pagini">
                <input type="text" class="form-control" name="cod_isbn" placeholder="Cod ISBN">
                <input type="decimal" class="form-control" name="cantitate" placeholder="Cantitate">
                <input type="decimal" class="form-control" name="pret" placeholder="Pret">
                <input type="decimal" class="form-control" name="pret_redus" placeholder="Reduceri de pret">
                <input type="text" class="form-control" name="um" placeholder="Unitate de Masura">
                <input type="file" class="form-control " name="image[]" multiple>

                <label>
                    <input type="radio" name="main_image" value="1">Imagine
                    principală
                    <input type="radio" name="main_image" value="0"> Imagini
                    aditionale
                </label> <br>

                <input type="submit" class="btn btn-primary" name="submit" value="Adauga">
            </form>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>