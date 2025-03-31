<?php

namespace App\Services\Interfaces;

/**
 * Interface UserCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface PostServiceInterface
{
    public function paginate($request, $languageId);
    public function create($reques, $languageId);
    public function update($id, $request,$languageId);
    public function destroy(int $id);
}
