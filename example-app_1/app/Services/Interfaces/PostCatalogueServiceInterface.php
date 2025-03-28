<?php

namespace App\Services\Interfaces;

/**
 * Interface userServiceInterface
 * @package App\Services\Interfaces
 */
interface PostCatalogueServiceInterface
{   
   public function paginate($request);
   public function create($request);
   public function update(int $id, $request);
   public function destroy(int $id);
}
