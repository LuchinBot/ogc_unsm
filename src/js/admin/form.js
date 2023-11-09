
$(document).ready(function () {
    var id = 0;
    $('.btn-id').on('click', function () {
        id = $(this).attr('id');
        //Petición ajax al servidor{
        $.ajax({
            type: "GET",
            url: "form?id=" + id,
            success: function (data) {
                $('.modal .body-wrapper').html(data);
            }
        });

    });



});

