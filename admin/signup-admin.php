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


<div class="container admin panou-administrare">
    <div class="back-button">
        <button class="btn btn-info"> <a href="login-admin.php"> Logare</a> </button>
    </div>
    <h2>Creare cont</h2>
    <form method="POST" action="signup-inc-admin.php">
        <input type="text" class="form-control" name="username_admin" placeholder="Username" required><br>
        <input type="password" class="form-control" name="password_admin" placeholder="Password" required><br>
        <input type="text" class="form-control" name="email_admin" placeholder="Email" required><br>
        <input type="submit" class="btn btn-primary" name="Trimite" value="Trimite">
    </form>

</div>

<?php
include 'footer.php';
?>