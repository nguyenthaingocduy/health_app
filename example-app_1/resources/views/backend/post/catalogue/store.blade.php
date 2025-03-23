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

@php
    $url = ($config['method'] == 'create') ? route('post.catalogue.store') : route('post.catalogue.update', $postCatalogue->id);
@endphp

<form action="{{ $url}}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-9">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        @include('backend.post.catalogue.component.general')
                    </div>
                </div> 
                @include('backend.post.catalogue.component.seo')
            </div>
            <div class="col-lg-3">
        <div class="ibox">
                
            <div class="ibox-content">
                <div class="row mb15">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <label for="" class="control-label text-left">Chọn danh mục cha<span class="text-danger">(*)</span></label>
                            <span class="text-danger notice ">*Chọn root nếu không có danh mục cha</span>
                            <select name="" class="form-control setupSelect2">
                                <option value="0">Chọn danh mục cha</option>
                                <option value="1">Root</option>
                                <option value="2">...</option>
                                
                            </select>
                        </div>
                    </div>
            
                </div>

            </div>
        </div>
        <div class="ibox">
            <div class="ibox-title">
                <h5>Chọn ảnh đại diện</h5>
            </div>
            <div class="ibox-content">
                <div class="row mb15">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <span class="image img-cover"><img src="backend/img/no_img.jpg" alt=""></span>
                            <input type="hidden" name="image" value="">
                          
                        </div>
                    </div>
            
                </div>

            </div>
        </div>
        <div class="ibox">
            <div class="ibox-title">
                <h5>Chọn tình trạng</h5>
            </div>
            <div class="ibox-content">
                <div class="row mb15">
                    <div class="col-lg-12">
                        <div class="form-row">
                            <select name="" class="form-control setupSelect2">
                                @foreach (config('apps.general.publish') as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                    
                                @endforeach
                                
                            </select>
                          
                        </div>
                        <select name="" class="form-control setupSelect2">
                            @foreach (config('apps.general.follow') as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                                
                            @endforeach
                            
                        </select>
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
