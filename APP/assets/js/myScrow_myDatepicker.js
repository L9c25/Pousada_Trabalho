// $('.input-daterange').datepicker({
//     language: "pt-BR",

//     autoclose: true,
//     format: "yyyy/mm/dd",
//     startDate: '-0d',
//     endDate: '+2m',
// });


// datepicker desktop
$(document).ready(function () {
    var chekin = document.querySelectorAll('#CheckInDatePicker');
    var chekout = document.querySelectorAll('#CheckOutDatePicker');
    var mb_chekin = document.querySelectorAll('#mbCheckInDatePicker');
    var mb_chekout = document.querySelectorAll('#mbCheckOutDatePicker');
    // Configuração do DatePicker de Check-In
    $(chekin).datepicker({
        language: "pt-BR",
        autoclose: true,
        format: "yyyy/mm/dd",
        startDate: '-0d',
        clearBtn: true,
        todayBtn: "linked"
    }).on('changeDate', function (e) {
        // A data selecionada no DatePicker de Check-In
        var checkInDate = e.date;
        // Adiciona 1 dia à data de Check-In para definir como a data mínima de Check-Out
        var checkOutMinDate = new Date(checkInDate);
        checkOutMinDate.setDate(checkOutMinDate.getDate() + 1);

        // Atualiza o DatePicker de Check-Out
        $(chekout).datepicker('setStartDate', checkOutMinDate);
        // Configura a data de Check-Out para ser pelo menos 1 dia após a data de Check-In
        $(chekout).datepicker('setDate', checkOutMinDate);
        $(chekout).focus()
    });

    // Configuração inicial do DatePicker de Check-Out
    $(chekout).datepicker({
        language: "pt-BR",
        autoclose: true,
        format: "yyyy/mm/dd",
        clearBtn: true,
        startDate: '+1d' // Começa com uma data mínima de +1 dia a partir de hoje por padrão
    });

    //! datepicker mobile
    $(mb_chekin).datepicker({
        language: "pt-BR",
        autoclose: true,
        format: "yyyy/mm/dd",
        startDate: '-0d',
        clearBtn: true,
        todayBtn: "linked"

    }).on('changeDate', function (e) {
        // A data selecionada no DatePicker de Check-In
        var checkInDate = e.date;
        // Adiciona 1 dia à data de Check-In para definir como a data mínima de Check-Out
        var checkOutMinDate = new Date(checkInDate);
        checkOutMinDate.setDate(checkOutMinDate.getDate() + 1);

        // Atualiza o DatePicker de Check-Out
        $(mb_chekout).datepicker('setStartDate', checkOutMinDate);
        // Configura a data de Check-Out para ser pelo menos 1 dia após a data de Check-In
        $(mb_chekout).datepicker('setDate', checkOutMinDate);
        $(mb_chekout).focus()
    });

    // Configuração inicial do DatePicker de Check-Out
    $(mb_chekout).datepicker({
        language: "pt-BR",
        autoclose: true,
        format: "yyyy/mm/dd",
        clearBtn: true,
        startDate: '+1d' // Começa com uma data mínima de +1 dia a partir de hoje por padrão
    });



    $('#up-btn').hide() // esconde o botao quando a page é carregada
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 260) { // distancia que tem que rolar antes de aparecer
            $('#up-btn').fadeIn(250);
        } else {
            $('#up-btn').fadeOut(250);
        }
    });
    // manda pro topo
    $('#up-btn').click(function (event) {
        event.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 0);
    });
    


     $(".modal-desktop").css({top: "-150%"}); //iniciando o modal acima do header
     $("#menu-guest").click(function() {
         $(".modal-desktop")
         .animate({top: "0"}, {queue: false} , 500 ) // animaçao quando  o icon é clicado/// queue fakse faz tudo rodar ao mesmo tempo
         .animate({opacity: 1}, 650);
         
         $(".nm-fade").fadeOut()
     });
     $(".close-modal").click(function() { 
        $(".modal-desktop")
        .animate({top: "-100%"}, {queue: false}, 500)
        .animate({opacity: 0}, 200);
        
        $(".nm-fade").fadeIn()
    });
});

ScrollReveal().reveal('#img-1', {
    delay: 20,
    duration: 400,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'left',
    distance: '10px'
});

ScrollReveal().reveal('#img-2', {
    delay: 20,
    duration: 400,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'right',
    distance: '10px'

});

ScrollReveal().reveal('#img-3', {
    delay: 20,
    duration: 410,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'right',
    distance: '10px'
});

ScrollReveal().reveal('#img-5', {
    delay: 20,
    duration: 500,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'left',
    distance: '10px'
});

ScrollReveal().reveal('#img-6', {
    delay: 20,
    duration: 510,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'left',
    distance: '10px'
});

ScrollReveal().reveal('#img-4', {
    delay: 20,
    duration: 510,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'right',
    distance: '10px'
});

ScrollReveal().reveal('#nome-empresa', {
    origin: 'bottom',
    delay: 80,
    duration: 400,
    reset: false,
    distance: '20px',
    opacity: 0,
    easing: 'cubic-bezier(.3,-0.01,.22,1)'
});

ScrollReveal().reveal('#text-empresa', {
    origin: 'bottom',
    delay: 140,
    duration: 400,
    reset: false,
    distance: '20px',
    opacity: 0,
    easing: 'cubic-bezier(.3,-0.01,.22,1)'
});

ScrollReveal().reveal('.card-rating', { interval: 200 });


