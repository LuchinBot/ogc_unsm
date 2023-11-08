
$(document).ready(function () {

    $('#btn_collapseTable').click(function(){
        $(this).attr('disabled', true);
        $('#btn_collapseNew').attr('disabled', false);
        $('#collapseTable').slideToggle();
        $('#collapseNew').slideToggle();
    });
    $('#btn_collapseNew').click(function(){
        $(this).attr('disabled', true);
        $('#btn_collapseTable').attr('disabled', false);
        $('#collapseTable').slideToggle();
        $('#collapseNew').slideToggle();
    });


});