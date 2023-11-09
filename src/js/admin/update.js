$(document).ready(function() {

    $('.float-delete').on('click', function() {
        var id = $(this).attr('id');
        console.log(id);

        //Petición ajax al servidor{
        $.ajax({
            type: "POST",
            url: "updateWeb?id=" + id,
            success: function(data) {
                fileUpdates('php');
            }
        });
    });

    function fileUpdates(id) {
        $.ajax({
            type: "GET",
            url: "files?id=" + id,
            success: function(data) {
                console.log(id);
                $('.files_ajax').html(data);
            }
        });
    }
});