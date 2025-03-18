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



<form action="{{ route('user.destroy', $user->id) }}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Bạn muốn xóa thành viên có email là: {{ $user->email }}</p>
                        <p>- Lưu ý: Không thể khôi phục thành viên khi đã xóa. Hãy chắc chắn bạn muốn thực hiện chức năng này <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                
            <div class="ibox-content">
                <div class="row mb15">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-label text-left">Email <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email', ($user->email) ?? '') }}"
                                        placeholder="Nhập email" autocomplete="off" readonly>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-label text-left">Họ và tên: <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="name"  value="{{ old('name', ($user->name) ?? '' ) }}"
                                        placeholder="Nhập họ và tên" autocomplete="off" readonly>
                    </div>
                    </div>
        </div>
        @php
            $userCatalogue = [
                '[Chọn nhóm thành viên]',
                'Quản trị viên',
                'Cộng tác viên'
            ]
        @endphp

  
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

