<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TenantUserController extends Controller
{

    function createFirstUser(){
        $tenant = tenant();
        $user = new User();
        $user->name = $tenant->name;
        $user->email = $tenant->email;
        $user->password = $tenant->password;
        $user->save();
        return response()->redirectTo('/home');
    }
}
