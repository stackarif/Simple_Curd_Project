<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleApiController extends Controller
{
    public function people($slug){
        $main_section=People::where('slug', $slug)->get();
        
        return response()->json($main_section);
    }
}
