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

    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        product(page);
        
    });
    function product(page){
        $.ajax({
            type:'GET',
            url: base_url+"/pagination/paginate-data?page="+page,
            success: function(data){
                if (data.is_success){
                $('.table-data').html(data.html);
            }}
        });
    }



});