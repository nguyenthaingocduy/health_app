<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Tiêu đề bài viết<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" name="name" value="{{ old('name', ($post->name) ?? '') }}"
                placeholder="Nhập tiêu đ bài viết" autocomplete="off">
        </div>
    </div>
</div>
<div class="row mb30">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Mô tả ngắn</label>
            <textarea type="text" class="form-control ck-editor" name="description" 
                placeholder="Nhập mô tả ở đây..." autocomplete="off" id="ckDescription" data-height="100"> {{ old('description', ($post->description) ?? '') }}</textarea>
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
                placeholder="" autocomplete="off" id="ckContent" data-height="500">{{ old('content', ($post->content) ?? '') }}</textarea>
        </div>
    </div>
</div>