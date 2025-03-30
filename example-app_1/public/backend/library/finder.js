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
HT.uploadAlbum = () => {
   $(document).on('click', '.upload-picture', function(e){
       HT.browseServerAlbum();
       e.preventDefault();
   })
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

HT.browseServerAlbum = () => {
   var type = 'Images';
   var finder = new CKFinder();

   finder.resourceType = type;
   finder.selectActionFunction = function(fileUrl, data, allFiles) {
       let html = '';
       let uniqueImages = new Set();

       console.log("Danh sách ảnh chọn:", allFiles);

       for (var i = 0; i < allFiles.length; i++) {
           var image = allFiles[i].url;

           if (!uniqueImages.has(image) && $('#sortable').find('input[value="'+image+'"]').length === 0) {
               uniqueImages.add(image);

               html += '<li class="ui-state-default">';
               html += ' <div class="thumb">';
               html += ' <span class="span image img-scaledown">';
               html += '<img src="'+image+'" alt="'+image+'">';
               html += '<input type="hidden" name="album[]" value="'+image+'">';
               html += '</span>';
               html += '<button class="delete-image"><i class="fa fa-trash"></i></button>';
               html += '</div>';
               html += '</li>';
           }
       }

       if (html !== '') {
           $('.click-to-upload').addClass('hidden');
           $('#sortable').append(html);
           $('.upload-list').removeClass('hidden');

           // Kích hoạt sortable() sau khi thêm ảnh
           $("#sortable").sortable({
               placeholder: "ui-state-highlight",
               update: function(event, ui) {
                   console.log("Thứ tự mới:", $("#sortable").sortable("toArray"));
               }
           }).disableSelection();
       }
   };

   finder.popup();
};


HT.deletePicture = () => {
   $(document).on('click', '.delete-image', function(){
       let _this = $(this)
       _this.parents('.ui-state-default').remove()
       if($('.ui-state-default').length == 0){
           $('.click-to-upload').removeClass('hidden')
           $('.upload-list').addClass('hidden')
       }
   })
}


  $(document).ready(function(){
     HT.uploadImageToInput();
     HT.setupCKEditor();
     HT.uploadImageAvatar();
     HT.multipleUploadImageCkeditor();
     HT.uploadAlbum();
     HT.deletePicture();


  });
})(jQuery);
