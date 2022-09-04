<?php

namespace App\Http\Controllers\Admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public function show()
    {
        return view("Admin.user.user");
    }
}
