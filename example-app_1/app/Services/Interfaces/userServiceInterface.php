<?php

namespace App\Services\Interfaces;

/**
 * Interface userServiceInterface
 * @package App\Services\Interfaces
 */
interface userServiceInterface
{   
   public function paginate();
   public function create($request);
   public function update(int $id, $request);
   public function destroy(int $id);
}
