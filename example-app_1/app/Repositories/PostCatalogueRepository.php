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

    public function pagination($column = ['*'], $condition = [], $join = [], $extend = [], $perPage = 1, array $relations = [], array $orderBy = ['id', 'DESC'], array $where = []){
        $query = $this->model->select(is_array($column) ? $column : ['*'])
        ->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%'); 
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

    public function getPostCatalogueById(int $id = 0, $language_id = 0) {
        // Trả về danh sách người dùng (ví dụ)
        return $this->model->select([
            'post_catalogues.id',
            'post_catalogues.parentid',
            'post_catalogues.image',
            'post_catalogues.icon',
            'post_catalogues.album',
            'post_catalogues.publish',
            'post_catalogues.follow',
            'tb2.name',
            'tb2.description',
            'tb2.content',
            'tb2.meta_title',
            'tb2.meta_description',
            'tb2.meta_keyword',
            'tb2.canonical',
        ])->join('post_catalogue_language as tb2', 'tb2.post_catalogue_id', '=', 'post_catalogues.id')
        ->where('tb2.language_id','=', $language_id)
        ->findOrFail($id);
    }


   

   
    
}