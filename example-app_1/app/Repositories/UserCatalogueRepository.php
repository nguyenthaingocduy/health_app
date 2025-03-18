<?php
namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use App\Repositories\BaseRepository;

class UserCatalogueRepository extends BaseRepository  implements UserCatalogueRepositoryInterface{


    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function getAll() {
        // Trả về danh sách người dùng (ví dụ)
        return [];
    }

   
    
}