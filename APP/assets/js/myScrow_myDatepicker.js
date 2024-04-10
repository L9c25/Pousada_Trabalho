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

ScrollReveal().reveal('#img-cardapio', {
    delay: 20,
    duration: 400,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'right',
    distance: '10px'

});

ScrollReveal().reveal('#txt-box-cardapio', {
    delay: 30,
    duration: 600,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'left',
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

ScrollReveal().reveal('#img-sobre-nos', {
    delay: 20,
    duration: 510,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'left',
    distance: '10px'
});

ScrollReveal().reveal('#txt-box-sobre-nos', {
    delay: 20,
    duration: 510,
    reset: false,
    easing: 'cubic-bezier(.25,.1,.64,.96)',
    origin: 'right',
    distance: '10px'
});