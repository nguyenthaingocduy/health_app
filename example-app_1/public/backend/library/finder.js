(function($){
   "use strict";
   var HT = {};

   HT.setupCKEditor = () => {
        if($('.ck-editor')){
           $('.ck-editor').each(function(){
              let editor = $(this);
              let elementId = editor.attr('id');
              let elementHeight = editor.attr('data-height');
              HT.ckeditor4(elementId, elementHeight);
           })
   }
}

HT.multipleUploadImageCkeditor = () => {
   $(document).on('click', '.multipleUploadImageCkeditor', function(e){
       let object = $(this)
       let target = object.attr('data-target')
       HT.browseServerCkeditor(object, 'Images', target);
       e.preventDefault()
   })
}

HT.ckeditor4 = (elementId, elementHeight) => {
  if(typeof(elementHeight) == 'undefined'){
      elementHeight = 500;
  }
  CKEDITOR.replace( elementId, {
      height: elementHeight,
      removeButtons: '',
      entities: true,
      allowedContent: true,
      toolbarGroups: [
          { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker','undo' ] },
          { name: 'links' },
          { name: 'insert' },
          { name: 'forms' },
          { name: 'tools' },
          { name: 'document',    groups: [ 'mode', 'document', 'doctools'] },
          { name: 'others' },
          { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup','colors','styles','indent'  ] },
          { name: 'paragraph',   groups: [ 'list', '', 'blocks', 'align', 'bidi' ] },
      ],
      removeButtons: 'Save,NewPage,Pdf,Preview,Print,Find,Replace,CreateDiv,SelectAll,Symbol,Block,Button,Language',
      removePlugins: "exportpdf",
  
  });
}


     HT.uploadImageToInput =  () => {
        $('.upload-image').click(function(){
           let input = $(this)
           let type = input.attr('data-type');
           HT.setupCKFinder2(input, type);
        });
     }

     HT.uploadImageAvatar = () => {
        $('.img-target').click(function(){
           let input = $(this)
           let type = 'Images';
           HT.browerServeAvatar(input, type);
        })

   HT.setupCKFinder2 = (object,type) => {
     if(typeof(type) == 'undefined'){
      type = 'Images';
   }
   var finder = new CKFinder();
   finder.resourceType = type;
   finder.selectActionFunction = function(fileUrl, data){
      object.find('img').attr('src', fileUrl);
        object.siblings('input').val(fileUrl);
   }
   finder.popup();
  
}
}
HT.browerServeAvatar = (object,type) => {
  if(typeof(type) == 'undefined'){
     type = 'Images';
  }
  var finder = new CKFinder();
  finder.resourceType = type;
  finder.selectActionFunction = function(fileUrl, data){
     object.find('img').attr('src', fileUrl)
     object.val(fileUrl);
  }
  finder.popup();
}
HT.browseServerCkeditor = (object, type, target) => {
   if(typeof(type) == 'undefined'){
       type = 'Images';
   }
   var finder = new CKFinder();
   
   finder.resourceType = type;
   finder.selectActionFunction = function( fileUrl, data, allFiles ) {
       let html = '';
       console.log(allFiles); // Debug xem có bị lặp phần tử không

        let uniqueImages = new Set(); // Dùng Set để tránh trùng lặp ảnh

        for (var i = 0; i < allFiles.length; i++) {
            var image = allFiles[i].url;

            if (!uniqueImages.has(image)) { // Chỉ thêm nếu chưa tồn tại
                uniqueImages.add(image);
                html += '<div class="image-content"><figure>';
                html += '<img src="'+image+'" alt="'+image+'">';
                html += '<figcaption>Nhập vào mô tả cho ảnh</figcaption>';
                html += '</figure></div>';
            }}
       CKEDITOR.instances[target].insertHtml(html)
   }
   finder.popup();
}


  $(document).ready(function(){
     HT.uploadImageToInput();
     HT.setupCKEditor();
     HT.uploadImageAvatar();
     HT.multipleUploadImageCkeditor();

  });
})(jQuery);
