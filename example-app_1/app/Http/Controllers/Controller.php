<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    // can dung khi viet van de ve language trong project(duoc su dung trong PostCatalogueController), va service
    public function currentLanguage()
    {
        return 1;
    }
}
