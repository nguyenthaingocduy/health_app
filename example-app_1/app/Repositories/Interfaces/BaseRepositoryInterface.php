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
      int $perPage = 1,
      array $extend = [],
      array $orderBy = ['id', 'DESC'],
      array $join = [],
      array $relations = [],
   );
   public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []);
   public function createPivot($model, array $payload = [], string $relation = '');
   public function forceDeleteByCondition(array $condition = []);
}
