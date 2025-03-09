<?php

namespace App\Repositories\Interfaces;


interface DistrictRepositoryInterface
{   
   public function all();
   public function findDistrictsByProvinceId(int $province_id);
   public function findById(int $modelId);
}
