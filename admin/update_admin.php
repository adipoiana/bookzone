<?php
include 'header_admin.php';

// obținem datele din formular
$id       = $_GET['id_admin'];
$username = $_POST['username_admin'];
$password = $_POST['password_admin'];
$email    = $_POST['email_admin'];
// actualizăm datele utilizatorului în baza de date
$sql = "UPDATE admins SET username_admin='$username', password_admin='$password', email_admin='$email' WHERE id_admin='$id'";
if (mysqli_query($conn, $sql))
{
	echo "
	<script>alert ('Datele au fost actualizate cu succes');
	window.location.href ='/bookzone/admin/utilizatori_admin.php';
	</script>
	";
}
else
{
	echo "A apărut o eroare la actualizarea datelor: " . mysqli_error($conn);
}

// închidem conexiunea la baza de date
mysqli_close($conn);
?>
<?php
include 'footer.php';
?>