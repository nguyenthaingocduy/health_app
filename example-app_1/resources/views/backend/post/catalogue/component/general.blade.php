<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Tiêu đề  nhóm bài viết<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" name="title" value="{{ old('title', ($postCatalogue->title) ?? '') }}"
                placeholder="Nhập tiêu đề nhóm bài viết" autocomplete="off">
        </div>
    </div>
</div>
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Mô tả<span class="text-danger">(*)</span></label>
            <textarea type="text" class="form-control ckeditor" name="description" value="{{ old('description', ($postCatalogue->description) ?? '') }}"
                placeholder="Nhập mô tả ở đây..." autocomplete="off"></textarea>
        </div>
    </div>
</div>
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Nội dung<span class="text-danger">(*)</span></label>
            <textarea type="text" class="form-control ckeditor" name="description" value="{{ old('description', ($postCatalogue->description) ?? '') }}"
                placeholder="" autocomplete="off"></textarea>
        </div>
    </div>
</div>