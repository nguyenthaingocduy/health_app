(function($){
    "use strict";
    var HT = {};



    HT.getLocation = () => {
        $(document).on('change', '.location', function(){
           let _this = $(this);
           let option =  {
                'data' : {
                    'location_id': _this.val(),

                },
                'target' : _this.attr('data-target')
           }
        //    console.log(option);
           HT.sendDataTogetLocation(option)
        })
    }
        HT.sendDataTogetLocation = (option) => {
        $.ajax({
            url: 'http://localhost:8000/ajax/location/getLocation',
            type: 'GET',

            data: {
                'target': option.target,  // Thêm target vào request
                'data': option.data       // Giữ nguyên data
            },
            
            dataType: 'json',
            // success: function(res){
            //     //
            //     $('.'+option.target).html(res.html);
            // },
          
            success: function (response) {
                // $('#districts').html(response.html)
                $('.'+option.target).html(response.html);
            },
            // error: function (xhr, status, error) {
            //     console.error("AJAX Error:", xhr.responseText); // Log the actual error
            // }
            error: function(jqXHR, textStatus, errorThrown){
                console.log('Loi: '+ textStatus + '' + errorThrown);
               
            }
        });
    }
    
    

    $(document).ready(function(){
        HT.getLocation();
    });
})(jQuery);
 
