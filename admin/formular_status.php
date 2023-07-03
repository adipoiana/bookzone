<?php
include 'header_admin.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 space_top_form adaugare_administrator">
            <div id="modal">
                <h2>Seteaza starea produsului</h2>
                <form action="update_status.php" method="post">
                    <input type="hidden" name="id_produs" id="id">
                    <label>
                        <input type="radio" name="status" value="1" id="disponibil_da">
                        Disponibil
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="status" value="0" id="disponibil_nu">
                        Indisponibil
                    </label>
                    <br>
                    <input type="submit" value="Salveaza">
                </form>
            </div>

            <script>
                function seteazaStare(id, status) {
                    document.getElementById("id").value = id;
                    if (disponibil == "1") {
                        document.getElementById("disponibil_da").checked = true;
                    } else {
                        document.getElementById("disponibil_nu").checked = true;
                    }
                    document.getElementById("modal").style.display = "block";
                }
            </script>

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>