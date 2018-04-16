$(document).ready(function () {
    $('#orderSuccessBtn').on('click', function () {
        window.location.href = '/';
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var maskCellphoneBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
    };

    var maskCellphoneOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(maskCellphoneBehavior.apply({}, arguments), options);
        }
    };

    $('.telefone').mask(maskCellphoneBehavior, maskCellphoneOptions);
    $('.cep').mask('99999-999');
});