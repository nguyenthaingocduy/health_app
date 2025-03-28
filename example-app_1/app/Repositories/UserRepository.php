<?php
namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository  implements UserRepositoryInterface{


    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function pagination($column = ['*'], $condition = [], $join = [], $extend = [], $perPage = 1, array $relations = [], array $orderBy = [], array $where = []){
        $query = $this->model->select(is_array($column) ? $column : ['*'])
        ->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%')
                ->orWhere('email', 'LIKE', '%'.$condition['keyword'].'%')
                ->orWhere('address', 'LIKE', '%'.$condition['keyword'].'%')
                ->orWhere('phone', 'LIKE', '%'.$condition['keyword'].'%');

            }
        })->with(['user_catalogues']);
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perPage)
                    ->withQueryString()->withPath(url($extend['path']));
    }
  

    
}