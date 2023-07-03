<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/includes/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Preiați datele din formular
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    // Setarea informațiilor despre expeditor și destinație
    $expeditor  = "noreply@example.com"; // Adresa de email a expeditorului
    $destinatar = "ady_poiana@hotmail.com"; // Adresa de email a destinatarului
    $subiect    = "Mesaj de contact"; // Subiectul emailului

    // Construiți corpul mesajului
    $corp_mesaj = "Nume: " . $name . "\n";
    $corp_mesaj .= "Email: " . $email . "\n";
    $corp_mesaj .= "Telefon: " . $phone . "\n";
    $corp_mesaj .= "Mesaj: " . $message . "\n";

    // Trimiteți mesajul
    $trimis = mail($destinatar, $subiect, $corp_mesaj, "From: " . $expeditor);

    // Verificați dacă mesajul a fost trimis cu succes
    if ($trimis)
    {
        echo " <script>alert('Mesajul a fost trimis cu succes.');
        window.location.href = '/bookzone/view/homepage_user.php';
        </script>";
    }
    else
    {
        echo "A apărut o eroare la trimiterea mesajului.";
    }
}
?>