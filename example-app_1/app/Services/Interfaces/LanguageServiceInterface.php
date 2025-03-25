<?php

namespace App\Services\Interfaces;

/**
 * Interface userServiceInterface
 * @package App\Services\Interfaces
 */
interface LanguageServiceInterface
{   
   public function paginate($request);
   public function create($request);
   public function update(int $id, $request);
   public function destroy(int $id);
   // public function currentLanguage();

}
