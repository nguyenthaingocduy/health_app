@include('backend.dashboard.component.breadcrumb', ['title' => $config ['seo'][$config['method']]['title']])

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = ($config['method'] == 'create') ? route('user.catalogue.store') : route('user.catalogue.update', $userCatalogue->id);
@endphp

<form action="{{ $url}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Nhập thông tin chung của nhóm thành viên</p>
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
                            <label for="" class="control-label text-left">Tên nhóm thành viên<span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', ($userCatalogue->name) ?? '') }}"
                                        placeholder="Nhập tên nhóm" autocomplete="off">
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <label for="" class="control-label text-left">Ghi chú </label>
                            {{-- <textarea class="form-control" name="description" placeholder="" autocomplete="off">{{ old('description', $userCatalogue->description ?? '') }}</textarea> --}}
                            <input type="text" class="form-control" name="description" value="{{ old('description', ($userCatalogue->description) ?? '') }}" 

                            placeholder="" autocomplete="off">
                    </div>
                    </div>
        </div>
    

 

    </div>
        </div>
    </div>
    
    </div>
    <hr>

        <div class="text-right mb15">
            <button type="submit" value="send" name="send" class="btn btn-primary">Lưu lại</button>
           
        </div>
    
    </div>
</form>
