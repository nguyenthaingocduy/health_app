<?php

namespace App\Repositories\Interfaces;

/**
 * Interface userServiceInterface
 * @package App\Services\Interfaces
 */
interface UserRepositoryInterface
{   
   public function getAllPaginate();
   public function create(array $data);
}
