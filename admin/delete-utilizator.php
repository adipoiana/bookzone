<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';
if (isset($_GET['id_utilizator']))
{
	$id  = $_GET['id_utilizator'];
	$sql = "DELETE FROM users WHERE id_utilizator = $id";
	if (mysqli_query($conn, $sql))
	{
		echo "Utilizatorul a fost șters cu succes.";
	}
	else
	{
		echo "Eroare la ștergerea utilizatorului: " . mysqli_error($conn);
	}
}


// Verificarea numarului de randuri afectate
echo "Numarul de randuri sterse: " . mysqli_affected_rows($conn);

// Inchiderea conexiunii
mysqli_close($conn);
?>

<?php
include 'footer.php';
?>