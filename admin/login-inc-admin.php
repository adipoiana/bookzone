<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/admin/includes/config.php';
if (!empty($_POST['username_admin']) && !empty($_POST['password_admin'])
    && isset($_POST['username_admin']) && isset($_POST['password_admin']))
{

    $username = strtolower($_POST['username_admin']);
    $password = $_POST['password_admin'];

    $sql    = "SELECT * FROM admins WHERE username_admin = '$username'";
    $result = mysqli_query($conn, $sql);
    $row    = $result->fetch_assoc();
    $hash   = $row['password_admin'];
    $check  = password_verify($password, $hash);

    if ($check == 0)
    {
        header("Location: login-admin.php?info=gresit");
        die();
    }
    else
    {
        $sql    = "SELECT * FROM admins WHERE username_admin = '$username' AND password_admin = '$hash'";
        $result = mysqli_query($conn, $sql);
        if (!$row = $result->fetch_assoc())
        {
            echo 'Parola sau username-ul nu se potrivesc';
        }
        else
        {
            $_SESSION['id_admin']       = $row['id_admin'];
            $_SESSION['username_admin'] = $row['username_admin'];
        }
        header('location: homepage_admin.php?info=logat');
    }

}
?>
<?php
include 'footer.php';
?>