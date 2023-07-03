<?php
require 'header_admin.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 space_top_form adaugare_administrator">
            <form method="POST" action="adaugare_categorie.php">
                <input type="text" class="form-control" name="nume_categorie" placeholder="Nume Categorie"> <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Trimite">
            </form>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>