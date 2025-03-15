(function($){
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');


    HT.switchery = () => {
        $('.js-switch').each(function(){
            // let _this = $(this)
            // var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(this, { color: '#1AB394' });
        })
    }

    HT.select2 = () => {
        if($('.setupSelect2').length)
            $('.setupSelect2').select2();
    } 
    HT.changeStatus = () => {
        if($('.status').length)
            $(document).on('change', '.status', function(e){
                let _this = $(this)
                let option = {
                    'value' : _this.val(),
                    'modelId' : _this.attr('data-modelId'),
                    'model' : _this.attr('data-model'),
                    'field' : _this.attr('data-field'),
                    '_token' : _token
                }
                $.ajax({
                    url: 'http://localhost:8000/ajax/dashboard/changeStatus',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: option,
                    
                    dataType: 'json',
                   
                  
                    success: function (response) {
                        console.log(response)
                    },
                    
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log('Loi: '+ textStatus + '' + errorThrown);
                       
                    }
                });
           

                e.preventDefault()
        })
    }
    

    HT.checkAll = () => {
        if($('#checkAll').length){
            $(document).on('click', '#checkAll', function(e){
                let isChecked = $(this).prop('checked')
                
                $('.checkboxItem').prop('checked', isChecked);
                $('.checkboxItem').each(function(){
                    let _this = $(this)
                    if(_this.prop('checked')){
                         _this.closest('tr').addClass('active-bg')
                    }else{
                        _this.closest('tr').removeClass('active-bg')

                    }
                }
            )

               
            })
        }
    }



    $(document).ready(function(){
        HT.switchery();
        HT.select2();
        HT.changeStatus();
        HT.checkAll();
    });
})(jQuery);

