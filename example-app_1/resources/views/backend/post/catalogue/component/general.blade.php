<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Tiêu đề  nhóm bài viết<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" name="name" value="{{ old('name', ($postCatalogue->name) ?? '') }}"
                placeholder="Nhập tiêu đề nhóm bài viết" autocomplete="off">
        </div>
    </div>
</div>
<div class="row mb30">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Mô tả ngắn</label>
            <textarea type="text" class="form-control ck-editor" name="description" 
                placeholder="Nhập mô tả ở đây..." autocomplete="off" id="ckDescription" data-height="100"> {{ old('description', ($postCatalogue->description) ?? '') }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-row">
           <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <label for="" class="control-label text-left">Nội dung</label>
            <a href="" class="multipleUploadImageCkeditor" data-target="ckContent">Upload nhiều hình ảnh</a>
           </div>
            <textarea type="text" class="form-control ck-editor" name="content"
                placeholder="" autocomplete="off" id="ckContent" data-height="500">{{ old('content', ($postCatalogue->content) ?? '') }}</textarea>
        </div>
    </div>
</div>