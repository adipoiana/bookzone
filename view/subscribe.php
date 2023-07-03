<?php
include 'header_user.php';
// Verifică dacă s-a trimis un email prin formular
if (isset($_POST['email']))
{
    $email = $_POST['email'];

    // Inserarea adresei de email în baza de date
    $sql    = "INSERT INTO subscribers (email) VALUES ('$email')";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        echo "<script>alert('Abonat cu succes');
        window.location.href='/bookzone/view/homepage_user.php';
        </script>";
    }
    else
    {
        echo "Eroare la abonare: " . mysqli_error($conn);
    }
}
?>