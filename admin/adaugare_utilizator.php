<?php
include 'header_admin.php';

// Verificați dacă s-a trimis un formular de adăugare și inserați utilizatorul în baza de date
if (isset($_POST['submit']))
{
    $username = $_POST["username_admin"];
    $password = $_POST["password_admin"];
    $email    = $_POST["email_admin"];


    $sql = "INSERT INTO admins (username_admin, password_admin, email_admin) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE)
    {

        echo "
	<script>alert ('Adaugat cu succes');
	window.location.href ='/bookzone/admin/utilizatori_admin.php';
	</script>
	";

    }
    else
    {
        echo "Eroare la adăugarea utilizatorului: " . $conn->$error;
    }
}

$conn->close();
?>
<?php
include 'footer.php';
?>