<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Database\Seeders\UserSeeder;
use App\Services\Interfaces\userCatalogueServiceInterface as UserCatalogueService;

use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Http\Requests\StoreUserRequest;

use App\Http\Requests\UpdateUserRequest;


class UserCatalogueController extends Controller

{
    protected $userCatalogueService;
    protected $ProvinceRepository;
    protected $userCatalogueRepository;

    public function __construct(UserCatalogueService $userCatalogueService , ProvinceRepository $ProvinceRepository, UserCatalogueRepository $userCatalogueRepository){
        $this->userCatalogueService = $userCatalogueService;
      
    }

    public function index(Request $request){
        $userCatalogues = $this->userCatalogueService->paginate($request);
        
      

        $config = [
            'js' => [
                
                'backend/js/plugins/switchery/switchery.js',
                 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'
            ],
            'css' => ['backend/css/plugins/switchery/switchery.css" rel="stylesheet', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css']
        ];;

        $config['seo'] = config('apps.userCatalogue');



        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'userCatalogues'));
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
        $config['seo'] = config('apps.userCatalogue');
        $config['method'] = 'create';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout', compact('template','config','provinces'));
       
    }
    public function store(StoreUserRequest $request){
        if($this->userCatalogueService->create($request)){
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }
    public function edit($id){
        $user = $this->userCatalogueRepository->findById($id);
        $provinces = $this->ProvinceRepository->all();
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
              
            ],
            'css' => ['https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css']
        ];
        $config['seo'] = config('apps.userCatalogue');
        $config['method'] = 'edit';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout', compact('template','config','provinces','user',));
    }
    public function update($id, UpdateUserRequest $request){
        if($this->userCatalogueService->update($id, $request)){
            return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id){
        $config['seo'] = config('apps.userCatalogue');

        $user = $this->userCatalogueRepository->findById($id);

        $template = 'backend.user.catalogue.delete';
        return view('backend.dashboard.layout', compact('template','config','user',));
    }
    public function destroy($id){
        if($this->userCatalogueService->destroy($id)){
            return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }





}
