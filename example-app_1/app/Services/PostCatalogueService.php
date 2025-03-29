<?php

namespace App\Services;

use App\Services\Interfaces\PostCatalogueServiceInterface;
use App\Services\Interfaces\BaseServiceInterface;
use App\Services\BaseService;
use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Classes\Nestedsetbie;

/**
 * Class PostCatalogueService
 * @package App\Services
 */
class PostCatalogueService extends BaseService implements PostCatalogueServiceInterface

{
    protected $postCatalogueRepository;
    protected $nestedsetbie;
    protected $language;


    public function __construct(PostCatalogueRepository $postCatalogueRepository) 
    {
        $this->language = $this->currentLanguage();
        $this -> postCatalogueRepository = $postCatalogueRepository;
        $this -> nestedsetbie = new Nestedsetbie([
            'table' => 'post_catalogue',
            'foreignkey' => 'post_catalogue_id',
            'language_id' => $this->language,
        ]);
  
    }



    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $condition['where'] = [
            'tb2.language_id', '=', $this->language,
        ];
        $perPage = $request->integer('perpage');
        $postCatalogues = $this->postCatalogueRepository->pagination($this->paginateSelect(), $condition, [
            ['post_catalogue_language as tb2','tb2.post_catalogue_id', '=', 'post_catalogues.id']
          
        ], ['path' => 'post.catalogue.index'], $perPage, [], 
        [
            'post_catalogues.lft', 'ASC'
        ]
    );
        return $postCatalogues;
    }
    public function create($request){
        DB::beginTransaction();
        try{

            $payload = $request->only($this->payload());
            $payload['user_id'] = Auth::id();
      
            $postCatalogue = $this->postCatalogueRepository->create($payload);

            if($postCatalogue->id > 0){
               $payloadLanguage = $request->only($this->payloadLanguage());
               $payloadLanguage['language_id'] = $this->language;
                $payloadLanguage['post_catalogue_id'] = $postCatalogue->id;


                $language = $this->postCatalogueRepository->createLanguagePivot($payloadLanguage, $payloadLanguage);
            }
            $this->nestedsetbie->Get('level ASC', 'order ASC');
            $this->nestedsetbie->Recursive(0, $this->nestedsetbie->Set());
            $this->nestedsetbie->Action();


   
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }


    public function update($id, $request){
        DB::beginTransaction();
        try{
            $postCatalogue = $this->postCatalogueRepository->findById($id);
            $payload = $request->only($this->payload());
            
            $flag = $this->postCatalogueRepository->update($id, $payload);
            if($flag == TRUE){
                $payloadLanguage = $request->only($this->payloadLanguage());
                $payloadLanguage['language_id'] = $this->language;
                $payloadLanguage['post_catalogue_id'] = $id;
                $postCatalogue->languages()->detach([$payloadLanguage['language_id'], $id]);
                $reponse = $this->postCatalogueRepository
                                ->createLanguagePivot($postCatalogue, $payloadLanguage);
                            $this->nestedsetbie->Get('level ASC', 'order ASC');
                            $this->nestedsetbie->Recursive(0, $this->nestedsetbie->Set());
                            $this->nestedsetbie->Action();
            }
     

   
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
           
            $postCatalogue = $this->postCatalogueRepository->forceDelete($id);
            $this->nestedsetbie->Get('level ASC', 'order ASC');
            $this->nestedsetbie->Recursive(0, $this->nestedsetbie->Set());
            $this->nestedsetbie->Action();
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function updateStatus($post = []){

        DB::beginTransaction();
        try{
           
            $payload[$post['field']] =  (($post['value'] == 1) ? 0 : 1);
            $postCatalogue = $this->postCatalogueRepository->update($post['modelId'], $payload);
            // $this->changeUserStatus($post,  $payload[$post['field']]);
       
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
       
 
    }


    public function updateStatusAll($post = []){
        DB::beginTransaction();
        try{
           
            $payload[$post['field']] =  $post['value'];
           $flag =  $this->postCatalogueRepository->updateByWhereIn('id', $post['id'], $payload);
            // $this->changeUserStatus($post, $post['value']);
       
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    // private function changeUserStatus($post, $value){
    //     DB::beginTransaction();
    //     try{
    //         $array = [];
    //         if(isset($post['modelId'])){
    //             $array[] = $post['modelId'];
    //         }else {
    //             $array = $post['id'];
    //         }
    //         $payload[$post['field']] = $value;
    //         $this->postCatalogueRepository->updateByWhereIn('user_catalogue_id', $array, $payload);

    //         DB::commit();
    //         return true;
    //     }catch(\Exception $e){
    //         DB::rollBack();
    //         // Log::error($e->getMessage());
    //         echo $e->getMessage();die();
    //         return false;
    //     }
    // }



    private function paginateSelect(){
        return [
        'post_catalogues.id',
        'post_catalogues.publish',
        'post_catalogues.image',
        'post_catalogues.level',
        'post_catalogues.order',
        'post_catalogues.follow',
        'tb2.name',
        'tb2.canonical',
        ];
    }


    private function payload(){
        return ['parentid','follow', 'publish', 'image'];
    }
    private function payloadLanguage(){
        return ['name', 'description', 'content', 'meta_title', 'meta_description', 'meta_keyword', 'canonical'];
    }
    
}
