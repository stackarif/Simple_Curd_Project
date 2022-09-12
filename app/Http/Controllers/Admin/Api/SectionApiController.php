<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SectionApiController extends Controller
{
    public function section($slug){
        $main_section=Subcategory::where('slug', $slug)->get();
        
        return response()->json($main_section);
    }
}
