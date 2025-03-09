<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Database\Seeders\UserSeeder;
use App\Services\Interfaces\userServiceInterface as UserService;
use App\Http\Requests\StoreUserRequest;


use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
class UserController extends Controller

{
    protected $userService;
    protected $ProvinceRepository;

    public function __construct(UserService $userService , ProvinceRepository $ProvinceRepository){
        $this->userService = $userService;
        $this->ProvinceRepository = $ProvinceRepository;
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
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact('template','config','provinces'));
       
    }
    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('Success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }





}
