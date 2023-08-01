function updateCartItem(id_produs, newQuantity) {
    $.ajax({
        type: "POST",
        url: "updateCart.php",
        data: {
            id_produs: id_produs,
            quantity: newQuantity
        },
        success: function(pret) {
            // Dacă actualizarea coșului a fost realizată cu succes, reîncărcați pagina
            $('#total_price_'+id_produs).text(pret);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
$(document).ready(function () { // incarcare pagina
    $('.read-more').click(function (e) {
        e.preventDefault(); // intrerupe orice actiune pe buton
        var shortDesc = $(this).siblings('.short-description');
        var fullDesc = $(this).siblings('.full-description'); // frate
        var arrow = $(this).find(".arrow");
        if (shortDesc.is(':visible')) {
            shortDesc.hide(); // ascunde
            fullDesc.show(); // afiseaza
            $(this).find('.text').text('Citeste mai putin');  // in interior
            arrow.addClass("arrow-rotate");
        } else {
            shortDesc.show();
            fullDesc.hide();
            $(this).find('.text').text('Citeste mai mult');
            arrow.removeClass("arrow-rotate");
        }
    }); 
    $('.nav-link').on('click', function () {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        var target = $(this).attr('data-bs-target');
        $('.tab-pane').removeClass('show active');
        $(target).addClass('show active');
    });
    /*Textbox Events*/
$(document).on('focusin', 'navbar input.search-textbox', function(){
    if($(this).val() <= 0){
        var parent = $(this).closest('div.search');
        parent.addClass('focused');
    }
});
$(document).on('focusout', 'navbar input.search-textbox', function(){
    if($(this).val() <= 0){
        var parent = $(this).closest('div.search');
        parent.removeClass('focused');
    }
});
$(document).on('click', 'navbar .search', function(){
    $(this).children('input.search-textbox').focus();
});

/*Text Key Events for Animating Icons i.e. .ico-btn*/
$(document).on('keyup', 'navbar input.search-textbox', function(){
    var parent = $(this).closest('div.search');
    var phrase = $(this).val(),
        phrase_length = phrase.length;

    if(phrase_length >= 2){
        parent.addClass('multi-char');
        if(!parent.hasClass('not-null')){
            parent.addClass('not-null');
        }

    }
    else if(phrase_length == 1){
        parent.addClass('not-null');
        parent.removeClass('multi-char');
    }
    else if(phrase_length <= 0){
        parent.removeClass('not-null');
        parent.removeClass('multi-char');
    }
});

/*Tab Highlighter Functionality*/
$(document).on('click', 'navbar .tabs ul.navbar-body li a', function(){
    var $this = $(this);
    TabHighlighter.set($this);
    $this.closest('li').siblings('.active').removeClass('active');
    $this.closest('li').addClass('active');
});
var TabHighlighter = {
    set: function($this){
        $('.tab-highlighter').css({
            'left':  $this.closest('li').offset().left,
            'width': $this.closest('li').outerWidth()
        });
    },
    refresh: function(){
        var $this = $('.tabs ul.navbar-body li.active a');
        $('.tab-highlighter').css({
            'left':  $this.closest('li').offset().left,
            'width': $this.closest('li').outerWidth()
        });
    }
};
$(window).resize(function(){
    TabHighlighter.refresh();
});
$(document).ready(function(){
	TabHighlighter.refresh();
});
$(document).ready(function(){
  
    $('.text-field-input').on('focus', function(){
      $(this).closest('.field-wrapper').addClass('focused');
    });
    
    $('.text-field-input').on('blur', function(){
   
      if  ( $(this).val() === '') {
         $(this).closest('.field-wrapper').removeClass('focused');
      }
    });
    
  })


  const button = document.querySelector(".addtocart");
const done = document.querySelector(".done");
console.log(button);
let added = false;
button.addEventListener('click',()=>{
  if(added){
    done.style.transform = "translate(-110%) skew(-40deg)";
    added = false;
  }
  else{
    done.style.transform = "translate(0px)";
    added = true;
  }
    
});



});


