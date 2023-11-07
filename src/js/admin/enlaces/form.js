
$(document).ready(function () {
    
    $('.btn-id').on('click',function(){
        var id = $(this).attr('id');
        //Petición ajax al servidor{
            $.ajax({
                type: "POST",
                url : "form?id="+id,
                success: function(data){
                    $('.modal .body-wrapper').html(data);
                    console.log('nhaa');
                }
            });

    });

});