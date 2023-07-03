<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/includes/config.php';
echo ' <pre>';
print_r($_POST);
echo '</pre>';

if (!empty($_POST['username']) && !empty($_POST['password'])
    && isset($_POST['username']) && isset($_POST['password']))
{

    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    $sql    = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row    = $result->fetch_assoc();
    $hash   = $row['password'];
    $check  = password_verify($password, $hash);

    if ($check == 0)
    {
        header("Location: login.php?info=eroare");
        die();
    }
    else
    {
        $sql    = "SELECT * FROM users WHERE username = '$username' AND password = '$hash'";
        $result = mysqli_query($conn, $sql);
        if (!$row = $result->fetch_assoc())
        {
            header("Location: login.php?info=eroare");
        }
        else
        {
            $_SESSION['id_utilizator'] = $row['id_utilizator'];
            $_SESSION['username']      = $row['username'];
        }
        header('location: homepage_user.php?info=logat');
    }

}
?>