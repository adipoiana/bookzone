<?php
include 'header_admin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
{
    // Obțineți toate emailurile abonaților din baza de date
    $sql    = "SELECT email FROM subscribers";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        $subject = 'Noutăți și actualizări';
        $message = 'Salut! Acestea sunt ultimele noutăți și actualizări...'; // Completează mesajul cu noutățile dorite

        $headers = 'From: adresa@tadomeniu.com' . "\r\n" .
            'Reply-To: adresa@tadomeniu.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        while ($row = mysqli_fetch_assoc($result))
        {
            $email = $row['email'];
            mail($email, $subject, $message, $headers);
        }

        echo '
        <script>alert=("Noutățile au fost trimise către toți abonații.")
        window.location.href="/bookzone/admin/lista_abonati.php";
        </script>';

    }
    else
    {
        echo 'Nu există abonați.';
    }
}
else
{
    echo 'Invalid request.';
}
?>