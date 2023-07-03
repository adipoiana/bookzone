<?php
include 'header_admin.php';

// obținem ID-ul utilizatorului din parametrii URL-ului
$id = $_GET['id_admin'];

// obținem datele utilizatorului din baza de date
$sql    = "SELECT * FROM admins WHERE id_admin='$id'";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);

// afișăm formularul de editare
echo
    "
<div class='container add_admins'>
    <div class='row'>
        <div class='col-lg-4 adaugare_administrator'>
            <form method='POST' action='update_admin.php?id_admin=" . $_GET['id_admin'] . "'>
                <input type='text' class='form-control' name='username_admin' value='" . $row['username_admin'] . "'><br>
                <input type='password' class='form-control' name='password_admin' value='" . $row['password_admin'] . "'><br>
                <input type='text' class='form-control' name='email_admin' value='" . $row['email_admin'] . "'><br>
                <input type='submit' class='btn btn-primary' value='Actualizează' placeholder='Actualizeaza'>
            </form>
        </div>
    </div>
</div>
";
// închidem conexiunea la baza de date
mysqli_close($conn);
?>
<?php
include 'footer.php';
?>