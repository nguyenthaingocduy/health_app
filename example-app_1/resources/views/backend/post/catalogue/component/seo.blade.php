<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình SEO</h5>

    </div>
    <div class="ibox-content">
        <div class="seo-container">
            <div class="meta-title">Bệnh Viện Thẩm mỹ ABC - BV chuẩn Hàn tại Việt Nam</div>
            <div class="canonical">http://localhost:8000/thammyvienABC.com</div>
            <div class="meta-description">Bệnh viện thẩm mỹ ABC BV chuẩn Hàn đẳng cấp 5 ⭐ hàng đầu tại Việt Nam 100% Bác sĩ là thành viên Hiệp hội thẩm mỹ HQ.</div>
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
                        <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', ($postCatalogue->meta_title) ?? '') }}"
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
                        <textarea type="text" class="form-control" name="meta_description" value="{{ old('meta_description', ($postCatalogue->meta_description) ?? '') }}"
                        placeholder="" autocomplete="off"> </textarea>
 
                    </div>
                </div>
          
            </div>
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-label text-left">
                         <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <span>Đường dẫn</span>
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