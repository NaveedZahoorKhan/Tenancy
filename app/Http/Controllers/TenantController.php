<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stancl\Tenancy\Tenant;
class TenantController extends Controller
{
    function create(){
        return view('main.createTenant');
    }
    function createTenant(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $company = $request->company;
        $tenant = Tenant::new()->withDomains([$company.'.myapp.com'])
            ->withData(['plan' => 'free', 'name' => $user->name, 'email' => $user->email, 'password' => $user->password])
            ->save();
        return response()->redirectTo('http://'.$company.'.myapp.com/createFirstUser');
    }

}
