<?php
include 'header_user.php';
?>
<div class="container page-contact">
    <div class="container breadcrumb-top">
        <nav class="breadcrumbs">
            <a href="homepage_user.php" class="breadcrumbs__item">Pagina principala</a>
            <!-- <a href="#shop" class="breadcrumbs__item">Shop</a>
        <a href="#cart" class="breadcrumbs__item">Cart</a> -->
            <a href="#" class="breadcrumbs__item is-active">Contact</a>
        </nav>
    </div>
    <div class="container contact">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center ">

                <div class="progress-bar">
                    <div class="progress-bar-value"></div>
                </div>

                <div class="col-lg-2"></div>
            </div>
        </div>
        <div class="row">
            <h6 class="titlu-contact">Transport GRATUIT la comenzi de peste 150 de lei!</h6>
        </div>
    </div>
    <div class="container-fluid contact-info">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1>Contactati-ne</h1>
                <p>Ai nevoie de ajutor sau vrei să ne întrebi ceva? Lasă-ne un mesaj pe email sau completeaza formularul
                    de contact.
                </p>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="informatii-contact">
                    <section class="get-in-touch">
                        <h3 class="title">Informații de contact</h3>
                        <div class="contact-form">
                            <div class="company_register">
                                <h3>DATE FIRMA</h3>
                                <p>Bookzone S.R.L</p>
                                <p>C.U.I.: RO 44748128</p>
                                <P>Nr. Reg. Com. J40/14096/2021</P>
                            </div>
                            <div class="company_adress">
                                <h3>ADRESA</h3>
                                <p>Soseaua Berceni 104, bloc turn ICPET, sector 4, București</p>
                                <a href="https://www.google.com/maps/place/Bookzone/@44.3676144,26.142008,18z/data=!4m5!3m4!1s0x0:0x8bf8988a7d6fb2ad!8m2!3d44.3678777!4d26.1426249?shorturl=1"
                                    target="blank">
                                    Vezi harta</a>
                            </div>
                            <div class="company-telephone">
                                <h3>TELEFON</h3>
                                <a href="tel:031-433.50.68"><i
                                        class="fa-solid fa-truck"></i><span>031-433.50.68</span></a>
                            </div>
                            <div class="company_email">
                                <h3>EMAIL</h3>
                                <a href="mailto:office@bookzone.ro"><i
                                        class="fa-regular fa-envelope"></i><span>office@bookzone.ro</span></a>
                            </div>
                            <div class="company-program">
                                <h3>PROGRAM DE LUCRU</h3>
                                <p>Luni - Vineri: 08:30 - 17:30</p>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="formular-contact">
                    <section class="get-in-touch">
                        <h3 class="title">Formular de contact2</h3>
                        <div class="contact-form">
                            <form class="row" action="send_contact_form.php" method="POST">
                                <div class="form-field col-lg-12">
                                    <label class="label" for="name">Nume si prenume</label>
                                    <input type="text" class="input-text form-control" name="name" required>
                                </div>
                                <div class="form-field col-lg-12 ">
                                    <label class="label" for="email">E-mail</label>
                                    <input type="email" class="input-text form-control" name="email" required>
                                </div>
                                <div class="form-field col-lg-12 ">
                                    <label class="label" for="phone">Telefon</label>
                                    <input type="text" class="input-text form-control" name="phone">
                                </div>
                                <div class="form-field col-lg-12">
                                    <label class="label label-message" for="message">Mesaj</label>
                                    <textarea class="input-text form-control" name="message" required></textarea>
                                </div>
                                <div class="form-field col-lg-12 text-end">
                                    <input type="submit" class="submit-btn" name="submit " value="Trimite">
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>