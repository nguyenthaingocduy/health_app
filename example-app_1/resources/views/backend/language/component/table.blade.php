<table class="table table-striped table-bordered" >
    <thead>
    <tr>
        <th> <input type="checkbox" value="" id="checkAll" class="input-checkbox"> </th>
        <th style="width: 100px">Ảnh</th>
        <th >Tên ngôn ngữ</th>
        <th>Canonical</th>
        <th>Mô tả</th>
        <th class="text-center"> Trạng thái</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>

       @if(isset($languages) && is_object($languages))
            @foreach ($languages as $language)
    <tr>
        <td><input type="checkbox" value="{{ $language->id }}" class="checkboxItem input-checkbox"></td>
        <td>
            <span class="image img-cover"><img src="{{ $language->image }}" alt=""></span>
        </td>
        <td>
           {{ $language->name }}
        </td>
        <td>
            {{ $language->canonical }}
        </td>
        <td>
            {{ $language->description }}
         </td>
        <td class="text-center js-switch-{{ $language->id }}"> 

            <input type="checkbox" value="{{ $language->publish }}" class="js-switch status" data-field="publish" data-model="Language" {{ ($language->publish == 1) ? 'checked' : '' }} data-modelId = {{ $language->id }} />
        </td>
        <td class="text-center"> 
           <a href="{{ route('language.edit', $language->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
          
            <a href="{{ route('language.delete', $language->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>


        </td>
    </tr>
        @endforeach
     @endif
    
   
    </tbody>
</table>

{{ $languages -> links('pagination::bootstrap-4') }}


