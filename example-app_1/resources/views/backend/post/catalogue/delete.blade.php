@include('backend.dashboard.component.breadcrumb', ['title' => $config ['seo']['create']['title']])


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('post.catalogue.destroy', $postCatalogue->id) }}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Bạn muốn xóa nhóm bài viết có tên là: <span class="text-danger">{{ $postCatalogue->name }}</span> </p>
                        <p>- Lưu ý: Không thể khôi phục nhóm bài viết khi đã xóa. Hãy chắc chắn bạn muốn thực hiện chức năng này <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Tên nhóm bài viết<span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', ($postCatalogue->name) ?? '') }}"
                                                placeholder="" autocomplete="off" readonly>
                            </div>
                            </div>

                </div>
            
        
         
        
            </div>
    </div>
    
    </div>
    <hr>
</div>
<div class="text-right mb15">
    <button type="submit" value="send" name="send" class="btn btn-danger">Xóa dữ liệu</button>
   
</div>

</div>
</form>

