(function($){
    "use strict";
    var HT = {};

    HT.seoPreview = () => {
        $('input[name=name]').on('keyup', function(){
            let input = $(this)
            let value = input.val()
            $('meta-title').html(value)
        })
       
        $('input[name=canonical]').css({
            'padding-left': parseInt($('.baseURL').outerWidth()) + 10
    })

    $('input[name=canonical]').on('keyup', function(){
        let input = $(this)
        let value = input.val()
        $('.canonical').html(BASE_URL + value)
    })
}

   $(document).ready(function(){
        HT.seoPreview();
   });
})(jQuery);
