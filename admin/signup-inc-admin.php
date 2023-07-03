<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';


//se verifica daca variabilele sunt goale si daca sunt setate

if (!empty($_POST['username_admin']) && !empty($_POST['password_admin']) && !empty($_POST['email_admin'])
    && isset($_POST['username_admin']) && isset($_POST['password_admin']) && isset($_POST['email_admin']))
{
    $username        = $_POST['username_admin'];
    $password        = $_POST['password_admin'];
    $email           = $_POST['email_admin'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql    = "SELECT username_admin FROM admins WHERE username_admin = '$username'";
    $result = mysqli_query($conn, $sql);
    $check  = mysqli_num_rows($result);
    if ($check > 0)
    {
        header('Location: signup-admin.php?info=exista');
        die();
    }
    else
    {
        $sql    = "INSERT INTO admins (username_admin, password_admin, email_admin) VALUES('$username', '$password_hashed', '$email')";
        $result = mysqli_query($conn, $sql);
        header("location:login-admin.php?info=ok");
    }
}
else
{
    header("location:signup-admin.php?info=eroare");
}

?>
<?php
include 'footer.php';
?>