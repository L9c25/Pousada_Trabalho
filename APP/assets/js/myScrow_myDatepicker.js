$('.input-daterange').datepicker({
    language: "pt-BR",
    clearBtn: true,
    autoclose: true,
    format: "yyyy/mm/dd",
    startDate: '-0d',
    endDate: '+2m'
});

$(document).ready(function() {
    // Configuração do DatePicker de Check-In
    $('#CheckInDatePicker').datepicker({
        language: "pt-BR",
        autoclose: true,
        format: "yyyy/mm/dd",
        startDate: '-0d'
    }).on('changeDate', function(e) {
        // A data selecionada no DatePicker de Check-In
        var checkInDate = e.date;
        // Adiciona 1 dia à data de Check-In para definir como a data mínima de Check-Out
        var checkOutMinDate = new Date(checkInDate);
        checkOutMinDate.setDate(checkOutMinDate.getDate() + 1);
        
        // Atualiza o DatePicker de Check-Out
        $('#CheckOutDatePicker').datepicker('setStartDate', checkOutMinDate);
        // Configura a data de Check-Out para ser pelo menos 1 dia após a data de Check-In
        $('#CheckOutDatePicker').datepicker('setDate', checkOutMinDate);
        $('#CheckOutDatePicker').focus()
        console.log(checkOutMinDate)
    });

    // Configuração inicial do DatePicker de Check-Out
    $('#CheckOutDatePicker').datepicker({
        language: "pt-BR",
        autoclose: true,
        format: "yyyy/mm/dd",
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