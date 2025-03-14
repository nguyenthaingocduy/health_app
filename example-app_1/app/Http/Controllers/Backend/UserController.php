<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Database\Seeders\UserSeeder;
use App\Services\Interfaces\userServiceInterface as UserService;

use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\StoreUserRequest;

use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller

{
    protected $userService;
    protected $ProvinceRepository;
    protected $userRepository;

    public function __construct(UserService $userService , ProvinceRepository $ProvinceRepository, UserRepository $userRepository){
        $this->userService = $userService;
        $this->ProvinceRepository = $ProvinceRepository;
        $this->userRepository = $userRepository;
    }

    public function index(){
        $users = $this->userService->paginate();
        
      

        $config = [
            'js' => [
                
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => ['backend/css/plugins/switchery/switchery.css" rel="stylesheet']
        ];;

        $config['seo'] = config('apps.user');



        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));
    }

    public function create(){
        $provinces = $this->ProvinceRepository->all();
  

        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
              
            ],
            'css' => ['https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css']
        ];
        $config['seo'] = config('apps.user');
        $config['method'] = 'create';
        $template = 'backend.user.store';
        return view('backend.dashboard.layout', compact('template','config','provinces'));
       
    }
    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }
    public function edit($id){
        $user = $this->userRepository->findById($id);
        $provinces = $this->ProvinceRepository->all();
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
              
            ],
            'css' => ['https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css']
        ];
        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';
        $template = 'backend.user.store';
        return view('backend.dashboard.layout', compact('template','config','provinces','user',));
    }
    public function update($id, UpdateUserRequest $request){
        if($this->userService->update($id, $request)){
            return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id){
        $config['seo'] = config('apps.user');

        $user = $this->userRepository->findById($id);

        $template = 'backend.user.delete';
        return view('backend.dashboard.layout', compact('template','config','user',));
    }
    public function destroy($id){
        if($this->userService->destroy($id)){
            return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }





}
