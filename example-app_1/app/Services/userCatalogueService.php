<?php

namespace App\Services;

use App\Services\Interfaces\userCatalogueServiceInterface;
use App\Models\User;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
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
    public function __construct(UserCatalogueRepository $userCatalogueRepository ) 
    {
        $this -> userCatalogueRepository = $userCatalogueRepository;
    }



    public function paginate($request){

        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = $request->integer('perpage');
        $users = $this->userCatalogueRepository->pagination($this->paginateSelect(), $condition, [], ['path' => 'user/index'], $perPage);
        return $users;
    }
    public function create($request){
        DB::beginTransaction();
        try{

            $payload = $request->except(['_token', 'send','re-password']);
            $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            $payload['password'] = Hash::make($payload['password']);
      
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
            $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
      
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
           
            $user = $this->userCatalogueRepository->delete($id);
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
       
            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    private function convertBirthdayDate($birthday = ''){
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday= $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    private function paginateSelect(){
        return [
            'id', 
            'email', 
            'phone', 
            'address', 
            'name',
        'publish'];
    }
    
}
