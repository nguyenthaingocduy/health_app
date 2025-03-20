<form action="{{ route('user.index') }}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
                @php
                    $perpage = request('perpage') ?: old('perpage');
                @endphp
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <select class="form-control input-sm perpage filter mr10" name="perpage">
                        @for ($i=20; $i<=200; $i+=20)
                            <option {{ ($perpage == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }} bản ghi</option>
                        @endfor
                    </select>
               </div>
            </div>
            <div class="action">
    
                <div class="uk-flex uk-flex-middle" style="gap: 20px">
                    {{-- <select name="user-catalogue_id" class="form-control  mb0 mt15 ml10 setupSelect2">
                        <option value="0" selected="selected">Chọn nhóm thành viên</option>
                        <option value="1">Quản trị viên</option>
                    </select> --}}
                    <div class="uk-search uk-flex uk-flex-middle mr10 mb0">
                        <div class="input-group">
                            <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}" class="form-control" placeholder="Tìm kiếm...">
                            <span class="input-group-btn">
                                <button name="search" value="search" class="btn btn-primary mb0 btn-sm" type="submit">Tìm kiếm</button>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('user.create') }}" class="btn btn-danger btn-sm"><i class="fa fa-plus mr5"></i>Thêm mới thành viên</a>
                </div>
            </div>
        </div>
    </div>
</form>