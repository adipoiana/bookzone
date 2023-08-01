
// functie de afisare numarul de produse, utilizatri etc.
$(document).ready(function() {
    $('.counter-value').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 3500,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    //modal utilizatori administration
    $(document).ready(function() {
        $('h3').on('click', function() {
            $('#userModal').modal('show');
        });
    });
});