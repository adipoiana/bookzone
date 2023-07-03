<?php
include 'header_user.php';
?>
<div class="notification-message">
    <?php
    if (isset($_GET['info']) && $_GET['info'] == 'ok')
    {
        echo '<p id="success-message" style="text-align:center; color:#0ced90; font-size:30px;">Contul a fost creat cu succes</p>';
    }
    else if (isset($_GET['info']) && $_GET['info'] == 'eroare')
    {
        echo '<p id="error-message" style="text-align:center;  width:50%; color:red; font-size:20px;">Introducere gresita a parolei sau a username-ului</p>';
    }
    else if (isset($_GET['info']) && $_GET['info'] == 'exista')
    {
        echo '<p id="error-message" class="alert alert-danger" style="text-align:center; width:100%; margin:0; font-size:20px;">Username-ul există deja, reluați înregistrarea</p>';
    }
    ?>
</div>
<div class="complete-body">
    <div class="container-fluid contact">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center ">
                <div class="progress-bar">
                    <div class="progress-bar-value"></div>
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="row">
                <h6 class="titlu-contact">Transport GRATUIT la comenzi de peste 150 de lei!</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="signin-logo">
            <img src="/bookzone/image/logo-bookzone-H.png" alt="Logo">
        </div>
    </div>


    <div class="container body-login">
        <div class="frame">
            <div class="nav">
                <ul class="links">
                    <li class="signin-active"><a class="btn">Cont existent</a></li>
                    <li class="signup-inactive"><a class="btn">Cont nou</a></li>
                </ul>
            </div>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="logare-inc.php" method="post" name="form">
                    <label for="username">Username</label>
                    <input type="text" class="form-styling" name="username" placeholder="" />
                    <label for="password">Password</label>
                    <input type="password" class="form-styling" name="password" placeholder="" />
                    <input type="checkbox" id="checkbox" />
                    <label for="checkbox"><span class="ui"></span>Pastraza-ma logat</label>
                    <div class="btn-animate text-center">
                        <input type="submit" class="btn-signin" value="Conecteaza-te">
                    </div>
                </form>
                <form class="form-signup" action="signup-inc.php" method="post" name="form">

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
                    <input type="submit" class="btn-signup" name="Trimite" value="Trimite">
                    <div class="goback">
                        <a href="login.php" class="btn-goback" value="Refresh" onClick="history.go()">
                            Go Back</button></a>
                    </div>
                </form>

            </div>
            <div class="success">
                <svg width="270" height="270" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" id="check"
                    ng-class="checked ? 'checked' : ''">
                    <path fill="#ffffff"
                        d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314 c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042 c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" />
                </svg>
                <div class="successtext">
                    <p> New User registered, Kindly check your email for confirmation.</p>
                </div>
            </div>
            <div class="forgot">
                <a href="#">Ai uitat parola?</a>
            </div>
            <div>
                <div class="cover-photo"></div>
                <div class="profile-photo"></div>

                <h1 class="welcome">Welcome,User <br> <a href="homepage_user.php">Go to site </a></h1>

                <!-- <a href="login.php" class="btn-goback" value="Refresh" onClick="history.go()">Go back</a> -->
            </div>
        </div>
        <a id="refresh" value="Refresh" onClick="history.go(-1)">
            <svg class="refreshicon" version="1.1" id="Capa_1" x="0px" y="0px" width="25px" height="25px"
                viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;" xml:space="preserve">
                <path
                    d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224 c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5 c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5 c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025 c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614 l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z" />
            </svg>
        </a>
    </div>
</div>


<?php
include 'footer.php';
?>