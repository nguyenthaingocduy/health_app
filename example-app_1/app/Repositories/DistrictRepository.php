<?php
namespace App\Repositories;

use App\Models\District;

use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\BaseRepository;


class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface{

    protected $model;
    public function __construct(District $model)
    {
        $this->model = $model;
    }
    public function findDistrictsByProvinceId(int $province_id = 0){
        return $this->model->where('province_code', '=', $province_id)->get();
    }

    

    
}