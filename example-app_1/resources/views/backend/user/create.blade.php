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
<form action="{{ route('user.store') }}" method="POST" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Nhập thông tin chung của người dùng</p>
                        <p>- Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
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
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Nhập email" autocomplete="off">
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-label text-left">Họ và tên: <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="text"  value="{{ old('name') }}"
                                        placeholder="Nhập họ và tên" autocomplete="off">
                    </div>
                    </div>
        </div>
        <div class="row mb15">
            <div class="col-lg-6">
                <div class="form-row">
                    <label for="" class="control-label text-left">Nhóm thành viên <span class="text-danger">(*)</span></label>
                    <select name="user_catalouge_id" id="role" class="form-control setupSelect2">
                        <option value="">[Chọn nhóm thành viên]</option>
                        <option value="1">Quản trị viên</option>
                        <option value="2">Cộng tác viên</option>
                    </select>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="form-row">
                    <label for="" class="control-label text-left">Ngày sinh </label>
                    <input type="date" class="form-control" name="birthday"  value="{{ old('birthday') }}"
                                placeholder="Nhập ngày sinh" autocomplete="off">
            </div>
            </div>
        </div>
        <div class="row mb15">
                <div class="col-lg-6">
                    <div class="form-row">
                        <label for="" class="control-label text-left">Mật Khẩu<span class="text-danger">(*)</span></label>
                        <input type="password" class="form-control" name="password"  value=""
                        placeholder="Nhập password" autocomplete="off">
                            </div>
                            </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-label text-left">Nhập lại mật khẩu<span class="text-danger">(*)</span></label>
                            <input type="password" class="form-control" name="re_pasword" value=""
                                        placeholder="Nhập lại mật khẩu" autocomplete="off">
                            </div>
                            </div>
                            </div>
        <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">Ảnh đại diện</label>
                        <input type="picture" class="form-control input-image" name="picture"  value="{{ old('image') }}"
                        placeholder="" autocomplete="off" data-upload="Images">
                </div>
                </div>
            
                </div>

    </div>
        </div>
    </div>
    
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-5">
            <div class="panel-head">
                <div class="panel-title">Thông tin liên hệ</div>
                <p>- Nhập thông tin liên hệ của người dùng</p>
              
            </div>
        </div>
        <div class="col-lg-7">
            <div class="ibox">
            
        <div class="ibox-content">
            <div class="row mb15">
                <div class="col-lg-6">
                    <div class="form-row">
                        <label for="" class="control-label text-left">Tỉnh/Thành Phố </label>
                            <select name="province_id" class="form-control setupSelect2 province location" data-target = "districts">
                                <option value="0">[Chọn tỉnh]</option>
                                @if(isset($provinces))
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-row">
                        <label for="" class="control-label text-left">Quận/Huyện</label>
                        <select name="district_id" class="form-control districts  setupSelect2 location" data-target = "wards">
                            <option value="0">[Chọn Quận/Huyện]</option>
                            
                        </select>
                </div>
                </div>
    </div>
    <div class="row mb15">
        <div class="col-lg-6">
            <div class="form-row">
                <label for="" class="control-label text-left">Xã/Phường</label>
                <select name="ward_id"  class="form-control setupSelect2 wards" >
                    <option value="0">[Chọn xã/phường]</option>
                  
                </select>
        </div>
        </div>
        <div class="col-lg-6">
            <div class="form-row">
                <label for="" class="control-label text-left">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                            placeholder="Nhập địa chỉ" autocomplete="off">
        </div>
        </div>
    </div>
    <div class="row mb15">
            <div class="col-lg-6">
                <div class="form-row">
                    <label for="" class="control-label text-left">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone"  value="{{ old('phone') }}"
                    placeholder="Nhập số điện thoại" autocomplete="off">
                        </div>
                        </div>
                <div class="col-lg-6">
                    <div class="form-row">
                        <label for="" class="control-label text-left">Ghi chú</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}"
                                    placeholder="" autocomplete="off">
                        </div>
                        </div>
                        </div>
   

</div>
    </div>
</div>

</div>
        <div class="text-right mb15">
            <button type="submit" value="send" name="send" class="btn btn-primary">Lưu</button>
           
        </div>
    
    </div>
</form>