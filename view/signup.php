<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bookzone/view/includes/config.php';

echo '
<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="/bookzone/admin/includes/stylesheet-admin.css">
<link rel="stylesheet" type="text/css" href="/bookzone/view/includes/stylesheet.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
';
?>

<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Sign in here</h3>
        <form class="form-signup" action="signup-inc.php" method="post" name="form">
                <div class="inputBox">
                    <label for="nume">Nume</label>
                    <input type="text" class="form-styling" name="nume" placeholder="" />
                    <label for="prenume">Prenume</label>
                    <input type="text" class="form-styling" name="prenume" placeholder="" />
                    <label for="email">Email</label>
                    <input type="text" class="form-styling" name="email" placeholder="" />
                    <label for="username">Username</label>
                    <input type="text" class="form-styling" name="username" placeholder="" />
                    <label for="password">Password</label>
                    <input type="password" class="form-styling" name="password" placeholder="" />
                    <input type="submit" class="btn btn-primary" name="Trimite" value="Trimite">
                </div>

            </form>

    </div>

        


<?php
include 'footer.php';
?>