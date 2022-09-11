<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level_three;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class LevelThreeController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::latest()->get();
        return view('backend.level_three.index', compact('subcategories'));

    }

    public function getAllLevelThree()
    {
        return Level_three::with('sub')->latest()->get();


    }

    public function store(Request $request)
    {
       //return $request;
        $level_three = Level_three::create([
            'name' => $request->name,
            'slug' => $request->name,
            // 'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);
        if ($level_three) {
            return response()->json([
                'mgs' => "Custom Notification!"
            ]);
        }
        return $level_three;
    }

    public function view(Level_three $id)
    {
        return $id->load('sub');
    }

    public function update(Request $request, Level_three $id)
    {
        $id->update($request->all());
    }

    public function destroy($sub)
    {
        $sub = Level_three::whereId($sub)->first();

        if ($sub->delete()) {
            return response()->json([
                'mgs' => "Data delete kora hyche!"
            ]);
        }
    }
    
}
