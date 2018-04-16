$(document).ready(function () {

    var maskCellphoneBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00)00000-0000' : '(00)0000-00009';
    };

    var maskCellphoneOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(maskCellphoneBehavior.apply({}, arguments), options);
        }
    };

    $('#orc_telefone').mask(maskCellphoneBehavior, maskCellphoneOptions);
});