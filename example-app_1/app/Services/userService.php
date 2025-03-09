<?php

namespace App\Services;

use App\Services\Interfaces\userServiceInterface;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class userService
 * @package App\Services
 */
class userService implements userServiceInterface

{
    protected $userRepository;
    public function __construct(UserRepository $userRepository ) 
    {
        $this -> userRepository = $userRepository;
    }
    public function paginate(){
        $users = $this->userRepository->getAllPaginate();
        return $users;
    }
    public function create($request){
        DB::beginTransaction();
        try{

            $payload = $request->except(['_token', 'send','re-password']);
            $carbonDate = Carbon::createFromFormat('d/m/Y', $payload['birthday']);
            $payload['birthday'] = $carbonDate->format('Y-m-d H:i:s');
            $payload['password'] = Hash::make($payload['password']);

            $user = $this->userRepository->create($payload);

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }
    
}
