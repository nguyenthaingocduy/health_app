<?php
namespace App\Repositories;

use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use App\Repositories\BaseRepository;

class PostCatalogueRepository extends BaseRepository  implements PostCatalogueRepositoryInterface{


    protected $model;
    public function __construct(PostCatalogue $model)
    {
        $this->model = $model;
    }
    public function getAll() {
        // Trả về danh sách người dùng (ví dụ)
        return [];
    }

    public function getPostCatalogueById(int $id = 0, $language_id = 0) {
        // Trả về thông tin người dùng theo $id
        return [];
    }


   

   
    
}