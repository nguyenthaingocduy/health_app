<?php

namespace App\Repositories\Interfaces;

/**
 * Interface userServiceInterface
 * @package App\Services\Interfaces
 */
interface PostCatalogueRepositoryInterface
{   
 
   public function findById(int $modelId);
   public function create(array $data);
   public function update(int $id, array $payload);
   public function delete(int $id);
   public function forceDelete(int $id = 0);
   public function pagination(
      array $column = ['*'],
      array $condition = [],
      array $join = [],
      array $extend = [],
      int $perPage = 1,
      array $relations = [],
      array $orderBy = []
   );


   public function updateByWhereIn(string $whereInField = '', array $whereIn, array $payload);
   public function getAll();
   public function createLanguagePivot($model,array $payload = []);


}
