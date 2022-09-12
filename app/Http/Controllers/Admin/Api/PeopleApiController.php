<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Level_three;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleApiController extends Controller
{
    public function people($slug){
        $levelThree = Level_three::where('slug', $slug)->get();
        if(count($levelThree) > 0){
            $main_section= People::where('level_three_id',$levelThree[0]->id)->get();
            return response()->json($main_section);
        }else{
            return response()->json($levelThree);
        }
    }
}
