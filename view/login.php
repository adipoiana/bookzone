<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/conectare-bd.php';
include 'homepage.php';
?>
<?php
if (isset($_SESSION['id']))
{
    echo 'Numele meu este' . $_SESSION['nume'];
}
?>
<div class="container">
    <form class="login-form" method="POST" action="logare-inc.php">
        <input type='text' class='form-control' name='username' placeholder='Username'> <br>
        <input type='password' class='form-control' name='password' placeholder='Password'> <br>
        <input type='submit' class="btn btn-primary" name='Trimite' value='Logare'>
    </form>
    <?php
    if (isset($_GET['info']) && $_GET['info'] == 'gresit')
    {
        echo '<script>
        function logare(){
            alert("parola sau username gresit")
        }
        logare();
        </script>';
    }
    ?>
</div>
<?php
include 'footer.php';
?>