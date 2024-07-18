$(document).ready(function () {

    $('.status').click(function(e){
        e.preventDefault();

        let tracking = $(this).data('trackingnumber');
   
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1:8000/user',
            data : {'tracking': tracking},
            success: function (data){
                let response = data;
                if (response.is_success){
                    $('.modal-body').html(response.html);
                $('#exampleModal').modal('show');
                
                
            }
            }
        });

    });

});