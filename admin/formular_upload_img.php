<?php

include 'header_admin.php';



if (isset($_POST['submit']))
{


    // Preiați fișierul imagine încărcat
    $temp_image = $_FILES['image']['tmp_name'];
    $image      = $_FILES['image']['name'];
    $name       = $_FILES['image']['name'];
    $folder     = "images/" . $image;

    // Salvați imaginea în baza de date
    $sql    = "INSERT INTO images (name, image) VALUES ('$name' , '$image')";
    $result = mysqli_query($conn, $sql);
    if (move_uploaded_file($temp_image, $folder))
    {
        echo "<script>alert('Imagine incarcata cu succes')
        window.location.href='/bookzone/admin/listare_produse.php';
        </script>";
    }
    else
    {
        echo "Error uploading image: " . mysqli_error($conn);
    }

}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 space_top_form">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="image" class="form-control">
                <input type="submit" name="submit" value="Upload" class="btn btn-success my-3">
            </form>
        </div>
    </div>
</div>


<?php
// Preiați ID-ul imaginii din parametrul URL-ului



// Interogați baza de date pentru a prelua imaginea cu ID-ul specificat
$sql    = "SELECT * FROM images, produse WHERE images.id_image = produse.id_image";
$result = mysqli_query($conn, $sql);
// Verificați dacă interogarea a returnat o imagine
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);

    // Afiseaza imaginea
    echo "<img src='images/" . $row['image'] . "' >";
}
else
{
    echo "Image not found.";
}

?>