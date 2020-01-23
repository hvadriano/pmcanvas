$(document).ready(function(){
    /* User actions */
    $('#reset_senha').click(function(){
        if ($(this).is(':checked')) {
            $('#senha').removeAttr('disabled');
        } else {
            $('#senha').attr('disabled', true);
        }
    });
 
});