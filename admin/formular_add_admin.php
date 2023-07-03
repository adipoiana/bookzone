<?php
include 'header_admin.php';
?>
<div class="container">
    <div class="row add_admins">
        <div class="col-lg-4 adaugare_administrator">
            <form method="POST" action="adaugare_utilizator.php">
                <input type="text" class="form-control" name="username_admin" placeholder="Username"><br>
                <input type="password" class="form-control" name="password_admin" placeholder="Password"><br>
                <input type="text" class="form-control" name="email_admin" placeholder="Email"><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Adaugă">
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>