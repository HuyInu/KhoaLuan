<?php

namespace App\Http\Request\profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class profileRequest{

    function checkUserMail($req)
    {
        
        if($req->Email === Auth::user()->Email)
        {
            return true;
        }
        else 
        {
            return false;
        }

    }    
}