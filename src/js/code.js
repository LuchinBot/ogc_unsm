
$(document).ready(function () {

    var x = 1;
    $('.scroll').click(function () {
        if (x == 1) {
            $('.form-inputs').slideToggle();
            $(".btn-login i").removeClass('fa-solid fa-caret-down');
            $(".btn-login i").addClass('fa-solid fa-caret-right');
            x = 0;
        } else {
            $(".btn-login").attr("type", "submit");
        }
    });

    $('.moved').click(function () {
        state = 1;
        sessionStorage.setItem("state", state);
        base_show();


    });

    $('.links').hover(function () {
        var p =  $(this).attr('name');
        $('#'+p).slideDown();
    });

    $('.links').hover(
        function() {
            var p =  $(this).attr('name');
            $('#'+p).slideDown();
        },
        function() {
            var p =  $(this).attr('name');
            $('#'+p).slideUp();
        }
      );
});