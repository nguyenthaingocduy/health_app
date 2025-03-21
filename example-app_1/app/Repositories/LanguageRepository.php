<?php
namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use App\Repositories\BaseRepository;

class LanguageRepository extends BaseRepository  implements LanguageRepositoryInterface{


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