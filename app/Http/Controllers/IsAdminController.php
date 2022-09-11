<?php

namespace App\Http\Controllers;

use App\Models\IsAdmin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class IsAdminController extends Controller
{
    public function index(){
        $isadmin = IsAdmin::get()->all();
        // return $isadmin;
        return view('backend.auth.isadmin');
    }

    public function store(Request $request)
    {
        // return $request;
        $admin =  IsAdmin::create([
            
            'is_admin' => $request->input('is_admin'),
        ]);


        return redirect()->intended(RouteServiceProvider::ADMIN_PEOPLE);
    }
}
