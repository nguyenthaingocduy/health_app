<?php
namespace App\Repositories;

use App\Models\Base;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface{

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function pagination(
        array $column = ['*'], 
        array $condition = [], 
        int $perPage = 1,
        array $extend = [],
        array $orderBy = ['id', 'DESC'],
        array $join = [],
        array $relations = [],
        ){
        $query = $this->model->select(is_array($column) ? $column : ['*'])
        ->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%'); 
            }
            // if(isset($condition['where']) && count($condition['where'])){
            //     foreach($condition['where'] as $key => $val){
                    
            //             $query->where($val[0], $val[1], $val[2]);                  
            //     }
            // }
            // return $query;


            if(isset($condition['where']) && is_array($condition['where']) && count($condition['where'])){
                foreach($condition['where'] as $key => $val){
                    if (is_array($val) && count($val) >= 3) {  // Kiểm tra $val hợp lệ
                        $query->where($val[0], $val[1], $val[2]);  
                    } else {
                        \Log::error("Invalid condition format: " . json_encode($val));
                    }
                }
            }
            
        });
        if(isset($relations) && !empty($relations)){
            foreach($relations as $relation){
                $query->withCount($relation);
            }
        }
        if(isset($join) && is_array($join) && count($join)){
            foreach($join as $key => $val){
                $query->join($val[0], $val[1], $val[2], $val[3]);
            }
        }

        if(isset($orderBy) && is_array($orderBy) && count($orderBy)){
                $query->orderBy($orderBy[0], $orderBy[1]);
            
        }
        return $query->paginate($perPage)
                    ->withQueryString()->withPath(url($extend['path']));

    }

    public function create(array $payload = []){
        $model =  $this->model->create($payload);
        return $model->fresh();
    }


    public function update(int $id = 0, array $payload = []){
         $model = $this->findById($id);
         return $model->update($payload);
    }

    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []){
       return $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }

    public function delete(int $id = 0){
        return $this->findById($id)->delete();
    }

    public function forceDelete(int $id = 0){
        return $this->findById($id)->forceDelete();
    }

    public function all(){
        return $this->model->all();
    }

    public function findById(int $modelId, 
    array $column = ['*'], 
    array $relation = [])
    {
        
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }


    public function createLanguagePivot($model,array $payload = []){
        if(is_array($model)) {
            $model = $this->model->find($model['post_catalogue_id']);
        }
        return $model->languages()->attach($model->id, $payload);
    }
    
}