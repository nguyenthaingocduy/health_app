<table class="table table-striped table-bordered" >
    <thead>
    <tr>
        <th> <input type="checkbox" value="" id="checkAll" class="input-checkbox"> </th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th class="text-center">Nhóm thành viên</th>
        <th class="text-center"> Trạng thái</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>

       @if(isset($users) && is_object($users))
            @foreach ($users as $user)
    <tr>
        <td><input type="checkbox" value="{{ $user->id }}" class="checkboxItem input-checkbox"></td>
        <td>
           {{ $user->name }}
        </td>
        <td> 
          {{ $user->email }}
        </td>
        <td> 
            {{ $user->phone }}
        </td>
        <td> 
           {{ $user->address }}
        </td>
        <td class="text-center"> 
            {{ $user->user_catalogues->name }}
         </td>
        <td class="text-center js-switch-{{ $user->id }}"> 

            <input type="checkbox" value="{{ $user->publish }}" class="js-switch status" data-field="publish" data-model="User" {{ ($user->publish == 1) ? 'checked' : '' }} data-modelId = {{ $user->id }} />
        </td>
        <td class="text-center"> 
           <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
          
            <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>


        </td>
    </tr>
        @endforeach
     @endif
    
   
    </tbody>
</table>

{{ $users -> links('pagination::bootstrap-4') }}


