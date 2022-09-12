<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Level_three;
use Illuminate\Http\Request;

class SubsectionApiController extends Controller
{
    public function sub_section($slug){
        $main_section=Level_three::where('slug', $slug)->get();
        
        return response()->json($main_section);
    }
}
