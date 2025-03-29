<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình SEO</h5>

    </div>
    <div class="ibox-content">
        <div class="seo-container">
            <div class="meta-title">
                {{ 
                    (old('name',  ($postCatalogue->name) ?? '')) ? old('name', ($postCatalogue->name) ?? '') : 'Bạn chưa có tiêu đề SEO'
                    }}
            </div>
            <div class="canonical">{{ (old('canonical',  ($postCatalogue->canonical) ?? '')) ? config('app.url').old('canonical').config('apps.general.suffix') : 'http://duong-dan-cua-ban.html' }}</div>
            <div class="meta-description">
                {{ 
                    (old('meta_description', ($postCatalogue->meta_description)?? '')) ? old('meta_description', ($postCatalogue->meta_description)?? '') : 'Bạn chưa có mô tả SEO'
                    }}
                    </div>
        </div>
        <div class="seo-wrapper">
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                         <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <span>Mô tả SEO</span>
                            <span class="count_meta-title">0 ký tự</span>
                         </div>
                        </label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', ($postCatalogue->name) ?? '') }}"
                        placeholder="" autocomplete="off">
 
 
                    </div>
                </div>
          
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                         <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <span>Từ khóa SEO</span>
                            <span class="count_meta-description">0 ký tự</span>
                         </div>
                        </label>
                        <input type="text" class="form-control" name="meta_keyword" value="{{ old('meta_keyword', ($postCatalogue->meta_keyword) ?? '') }}"
                        placeholder="" autocomplete="off">
 
                    </div>
                </div>
          
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                         <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <span>Mô tả SEO</span>
                            <span class="count_meta-description">0 ký tự</span>
                         </div>
                        </label>
                        <textarea type="text" class="form-control" name="meta_description"
                        placeholder="" autocomplete="off">{{ old('meta_description', ($postCatalogue->meta_description) ?? '') }} </textarea>
 
                    </div>
                </div>
          
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                         <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <span>Đường dẫn <span class="text-danger">*</span></span>
                            <span class="count_meta-description">0 ký tự</span>
                         </div>
                        </label>
                       <div class="input-wrapper">
                        <input type="text" class="form-control" name="canonical" value="{{ old('canonical', ($postCatalogue->canonical) ?? '') }}"
                        placeholder="" autocomplete="off"> 
                        <span class="baseURL">{{ config('app.url') }}</span>
                       </div>
 
                    </div>
                </div>
          
            </div>
        </div>


    </div>
    
</div>  