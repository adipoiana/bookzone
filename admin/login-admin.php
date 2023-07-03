<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';
include 'background-admin.html';

echo '
<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/bookzone/admin/includes/stylesheet-admin.css">
<link rel="stylesheet" type="text/css" href="/bookzone/view/includes/stylesheet.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
';
?>
<div class="notification-message">
    <?php
    if (isset($_GET['info']) && $_GET['info'] == 'ok')
    {
        echo '<p style="text-align:center; color:#0ced90; font-size:30px;"> Contul a fost creat cu succes</p>';
    }
    else if (isset($_GET['info']) && $_GET['info'] == 'eroare')
    {
        echo '<p style="text-align:center; color:red; font-size:20px;"> A aparut o eroare</p>';
    }
    else if (isset($_GET['info']) && $_GET['info'] == 'exista')
    {
        echo '<p class="alert alert-danger" style="text-align:center;  font-size:20px;"> username exista deja</p>';
    }
    ?>
</div>
<div class="container admin panou-administrare">
    <div class="signup-admin">
        <button class="btn btn-info">
            <a href=" signup-admin.php"> Creare cont </a></button>
    </div>
    <div class="login-admin">
        <h2>Autentificare cont</h2>
        <form method="POST" action="login-inc-admin.php">
            <input type="text" class="form-control" name="username_admin" placeholder="Username" required><br>
            <input type="password" class="form-control" name="password_admin" placeholder="Password" required><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Logare">
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
</div>

<?php
include 'footer.php';
?>