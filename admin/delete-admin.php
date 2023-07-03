<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';
//preluare id utilizator de sters din formular
$id = $_GET['id_admin'];

//sterge utilizatorul din baza de date
$sql = "DELETE FROM admins WHERE id_admin = '$id'";
if (mysqli_query($conn, $sql))
{
	echo "
	<script>alert ('Utilizatorul a fost sters cu succes');
	window.location.href ='/bookzone/admin/utilizatori_admin.php';
	</script>
	";

}
else
{
	echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
}

//inchidere conexiune
mysqli_close($conn);
?>
<?php
include 'footer.php';
?>