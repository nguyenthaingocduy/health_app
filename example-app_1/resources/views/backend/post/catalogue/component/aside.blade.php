<div class="ibox">
                
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
                    <label for="" class="control-label text-left">Chọn danh mục cha<span class="text-danger">(*)</span></label>
                    <span class="text-danger notice ">*Chọn root nếu không có danh mục cha</span>
                    <select name="parent_id" class="form-control setupSelect2">
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
                    <span class="image img-cover img-target"><img src="{{ (old('image') ?? 'backend/img/no_img.jpg') }}" alt=""></span>
                    <input type="hidden" name="image" value="{{ old('image', ($postCatalogue->image) ?? '') }}">
                  
                </div>
            </div>
    
        </div>

    </div>
</div>
<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình nâng cao</h5>
    </div>
    <div class="ibox-content">
        <div class="row mb15">
            <div class="col-lg-12">
                <div class="form-row">
          <div class="mb15">
            <select name="" class="form-control setupSelect2">
                @foreach (config('apps.general.publish') as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                    
                @endforeach
                
            </select>
          
          </div>
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