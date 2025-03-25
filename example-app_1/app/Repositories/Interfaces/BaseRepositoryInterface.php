<?php

namespace App\Repositories\Interfaces;


interface BaseRepositoryInterface
{   
   public function all();
   public function findById(int $modelId);
   public function create(array $payload);
   public function update(int $id, array $payload);
   public function delete(int $id = 0);
   public function forceDelete(int $id = 0);
   public function pagination(
      array $column = ['*'],
      array $condition = [],
      array $join = [],
      array $extend = [],
      int $perPage = 1
   );
   public function updateByWhereIn(string $whereInField = '', array $whereIn, array $payload);
   public function createLanguagePivot($model,array $payload = []);
}
