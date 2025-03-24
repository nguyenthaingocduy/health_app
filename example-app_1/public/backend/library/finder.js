(function($){
    "use strict";
    var HT = {};

    HT.setupCKEditor = () => {
         if($('.ckeditor')){
            $('.ckeditor').each(function(){
               let editor = $(this);
               HT.ckeditor4(editor);
            })
    }
}

      HT.ckeditor4 = (elementId) => {
         CKEDITOR.replace(elementId, {
            height: 250,
            removeButtons:'',
            entities: true,
            allowedContent: true,
            toolbarGroups:[
            {name: 'clipboard', groups: ['clipboard', 'undo']},
            {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
            {name: 'links'},
            {name: 'insert'},
            {name: 'forms'},
            {name: 'tools'},
            {name: 'document', groups: ['mode', 'document', 'doctools']},
            {name: 'colors'},
            {name: 'others'},
            '/',


            ]
         }) 
      }


      HT.uploadImageToInput =  () => {
         $('.upload-image').click(function(){
            let input = $(this)
            let type = input.attr('data-type');
            HT.setupCKFinder2(input, type);
         });
      }

    HT.setupCKFinder2 = (object,type) => {
      if(typeof(type) == 'undefined'){
       type = 'Images';
    }
    var finder = new CKFinder();
    finder.resourceType = type;
    finder.selectActionFunction = function(fileUrl, data){
       object.val(fileUrl);
    }
    finder.popup();
   
}
   $(document).ready(function(){
      HT.uploadImageToInput();
      HT.setupCKEditor();

   });
})(jQuery);
