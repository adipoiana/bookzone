$(function() {
    $(".btn").click(function() {
    $(".form-signin").toggleClass("form-signin-left");
    $(".form-signup").toggleClass("form-signup-left");
    $(".frame").toggleClass("frame-long");
    $(".signup-inactive").toggleClass("signup-active");
    $(".signin-active").toggleClass("signin-inactive");
    $(".forgot").toggleClass("forgot-left");
    $(this).removeClass("idle").addClass("active");
    });
    });
    
    $(function() {
    $(".btn-signup").click(function() {
    $(".nav").toggleClass("nav-up");
    $(".form-signup-left").toggleClass("form-signup-down");
    $(".success").toggleClass("success-left");
    $(".frame").toggleClass("frame-short");
    });
    });
    
    $(function() {
    $(".btn-signin").click(function() {
    $(".btn-animate").toggleClass("btn-animate-grow");
    $(".welcome").toggleClass("welcome-left");
    $(".cover-photo").toggleClass("cover-photo-down");
    $(".frame").toggleClass("frame-short");
    $(".profile-photo").toggleClass("profile-photo-down");
    $(".btn-goback").toggleClass("btn-goback-up");
    $(".forgot").toggleClass("forgot-fade");
    });
    });
// Funcția care ascunde mesajul după 3 secunde
setTimeout(function() {
    var successMessage = document.getElementById('success-message');
    var errorMessage = document.getElementById('error-message');
    
    if (successMessage) {
        successMessage.style.display = 'none';
    }
    if (errorMessage) {
        errorMessage.style.display = 'none';
    }
}, 3000); // 3 secunde (3000 milisecunde)
    