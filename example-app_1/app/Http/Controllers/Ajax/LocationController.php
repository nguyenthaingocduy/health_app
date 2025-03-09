<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;
use App\Repositories\Interfaces\BaseRepositoryInterface as BaseRepository;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository; 
use Illuminate\Support\Facades\Log;



class LocationController extends Controller
{
    protected $provinceRepository;  
    protected $districtRepository;
    public function __construct(DistrictRepository $districtRepository, ProvinceRepository $provinceRepository){
    	$this->provinceRepository = $provinceRepository;
        $this->districtRepository = $districtRepository;
    }
    public function getLocation(Request $request){
        Log::info('Request received:', $request->all()); // Ghi log dữ liệu request
        $get = $request->input();
        $target = $request->input('target');
        $location_id = $request->input('data.location_id');
        $html = '';

        // if($get['target'] == 'districts'){
        //     $province = $this->provinceRepository->findById($get['data']['location_id'], ['code', 'name'],['districts']);
        //     $html = $this->renderHtml($province->districts);
        // }else if($get['target'] == 'wards'){
        //     $district = $this->districtRepository->findById($get['data']['location_id'], ['code', 'name'],['wards']);
        //     $html = $this->renderHtml($district->wards, '[Chọn Phường/Xã]');
        // }
        
        // if (!isset($get['target']) || !isset($get['data']['location_id'])) {
        //     return response()->json(['error' => 'Invalid request parameters'], 400);
        // }
    
        if (isset($get['target']) && $get['target'] == 'districts') {
            $province = $this->provinceRepository->findById($get['data']['location_id'], ['code', 'name'], ['districts']);
            $html = $this->renderHtml($province ? $province->districts : [], '[Chọn Quận/Huyện]');
        } else if (isset($get['target']) && $get['target'] == 'wards') {
            $district = $this->districtRepository->findById($get['data']['location_id'], ['code', 'name'], ['wards']);
            $html = $this->renderHtml($district ? $district->wards : [], '[Chọn Phường/Xã]');
        }
        
        
        $response = [
            'html' => $html
        ];
        return response()->json($response)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

       


    }

    public function renderHtml($districts, $root = '[Chọn Quận/Huyện]'){
        if (!$districts) {
            return '<option value="0">Không có dữ liệu</option>';
        }
        $html = '<option value="0">'.$root.'</option>';
        foreach($districts as $district){
            $html .= '<option value="'.$district->code.'">'.$district->name.'</option>';
        }
        return $html;
    
     }
     
     }

