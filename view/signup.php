<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/conectare-bd.php';
include 'homepage.php';
?>

<div class="container">
	<form class="signup-form" method="POST" action="signup-inc.php">
		<input type='text' class='form-control' name='nume' placeholder='Nume'> <br>
		<input type='text' class='form-control' name='prenume' placeholder='Prenume'> <br>
		<input type='text' class='form-control' name="username" placeholder='Username'> <br>
		<input type="password" class="form-control" name="password" placeholder="Password"> <br>
		<input type="submit" class="btn btn-primary" name='Trimite' value='Trimite'>
	</form>

	<?php
	if (isset($_GET['info']) && $_GET['info'] == 'ok')
	{
		echo '<p style="text-align:center; color:green; font-size:20px;"> Contul a fost creat cu succes</p>';
	}
	else if (isset($_GET['info']) && $_GET['info'] == 'eroare')
	{
		echo '<p style="text-align:center; color:red; font-size:20px;"> A aparut o eroare</p>';
	}
	else if (isset($_GET['info']) && $_GET['info'] == 'exista')
	{
		echo '<p class="alert alert-danger" style="text-align:center;  font-size:20px;"> Username exista deja</p>';
	}
	?>
</div>
<?php
include 'footer.php';
?>