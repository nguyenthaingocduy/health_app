<?php

namespace App\Services;

use App\Services\Interfaces\userCatalogueServiceInterface;
use App\Models\User;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class userCatalogueService
 * @package App\Services
 */
class userCatalogueService implements userCatalogueServiceInterface

{
    protected $userCatalogueRepository;
    protected $userRepository;

    public function __construct(UserCatalogueRepository $userCatalogueRepository, UserRepository $userRepository ) 
    {
        $this -> userCatalogueRepository = $userCatalogueRepository;
        $this -> userRepository = $userRepository;
    }



    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $users = $this->userCatalogueRepository->pagination($this->paginateSelect(), 
        $condition, 
        $perPage,
        ['path' => 'user/index'], 
        ['id', 'DESC'], 
        [],
        ['users']
       );
        return $users;
    }
    public function create($request){
        DB::beginTransaction();
        try{

            $payload = $request->except(['_token', 'send']);
      
            $user = $this->userCatalogueRepository->create($payload);
   
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
           
            $payload = $request->except(['_token', 'send']);
      
            $user = $this->userCatalogueRepository->update($id, $payload);
   
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
           
            $user = $this->userCatalogueRepository->forceDelete($id);
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
            $user = $this->userCatalogueRepository->update($post['modelId'], $payload);
            $this->changeUserStatus($post,  $payload[$post['field']]);
       
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
           $flag =  $this->userCatalogueRepository->updateByWhereIn('id', $post['id'], $payload);
            $this->changeUserStatus($post, $post['value']);
       
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    private function changeUserStatus($post, $value){
        DB::beginTransaction();
        try{
            $array = [];
            if(isset($post['modelId'])){
                $array[] = $post['modelId'];
            }else {
                $array = $post['id'];
            }
            $payload[$post['field']] = $value;
            $this->userRepository->updateByWhereIn('user_catalogue_id', $array, $payload);

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

  

    private function paginateSelect(){
        return [
            'id', 
            'name',
            'description',
            'publish'
        ];
    }
    
}
