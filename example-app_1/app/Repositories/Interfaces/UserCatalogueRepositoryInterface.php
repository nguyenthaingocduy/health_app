<?php

namespace App\Repositories\Interfaces;

/**
 * Interface userServiceInterface
 * @package App\Services\Interfaces
 */
interface UserCatalogueRepositoryInterface
{   
 
   public function findById(int $modelId);
   public function create(array $data);
   public function update(int $id, array $payload);
   public function delete(int $id);
   public function updateByWhereIn(string $whereInField = '', array $whereIn, array $payload);
   public function getAll();

}
