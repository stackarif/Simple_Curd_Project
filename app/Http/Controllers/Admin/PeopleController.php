<?php

namespace App\Http\Controllers\Admin;

use App\Action\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdatePeopleRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\People;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PeopleController extends Controller
{



    public function index()
    {
        $peoples = People::with('category','sub','level_three')->latest()->get();
        //return $peoples;
        return view('backend.people.index', compact('peoples'));
    }
    public function create()
    {
        $categories = Category::latest()->get();
        $sub_categories = Subcategory::latest()->get();
        return view('backend.people.create', compact('categories', 'sub_categories'));
    }

    public function store(PeopleRequest $request)
    {
        //return $request;
        $product = People::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'level_three_id' => $request->level_three_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'tel_phone' => $request->tel_phone,
            'designation' => $request->designation,
            'url' => $request->url,
        ]);
        
    
        session()->flash('success', 'People Added Successfully!');
        return redirect()->route('admin.people.index');
    }

    public function view(People $slug)
    {
        //return $slug;
        $people = $slug->load('category','sub','level_three');
        return view('backend.people.view', compact('people'));
    }
    public function delete(People $slug)
    {
        $sliders = $slug->sliders;
        $slug->delete();
     
        session()->flash('success', ' Deleted Successfully!');
        return redirect()->route('admin.people.index');
    }

   
    public function categories($id)
    {
        $data = Category::find($id)->sub_categories;
        //return $data;
        return response()->json([
            'data' => $data
        ]);
    }

    public function subcategories($id)
    {
        $data = Subcategory::find($id)->level_three;
       // return $data;
        return response()->json([
            'data' => $data
        ]);
    }

    public function edit(People $people)
    {

        $people = $people->load('category','sub','level_three');
        $categories = Category::latest()->get();
        return view('backend.people.edit', compact('people', 'categories'));
    }

    public function update(UpdatePeopleRequest $request, People $people)
    {
            //return $request;
            $people->update([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'level_three_id' => $request->level_three_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'tel_phone' => $request->tel_phone,
                'designation' => $request->designation,
                'url' => $request->url,

            ]);

        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.people.index');
    }

   

   
}