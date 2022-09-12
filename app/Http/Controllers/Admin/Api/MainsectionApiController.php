<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class MainsectionApiController extends Controller
{
    public function main_section($slug){
        $main_section= Category::where('slug', $slug)->get();
        
        return response()->json($main_section);
    }
}
