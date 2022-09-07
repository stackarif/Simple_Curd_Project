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
        $peoples = People::with('category','sub')->latest()->get();
        // return $peoples;
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
        //return Product::find(1)->sliders;
        $product = People::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'designation' => $request->designation,
        ]);
        
    
        session()->flash('success', 'People Added Successfully!');
        return redirect()->route('admin.people.index');
    }

    public function view(People $slug)
    {
        //return $slug;
        $product = $slug->load('category','sub');
        return view('backend.people.view', compact('product'));
    }
    public function delete(People $slug)
    {
        $sliders = $slug->sliders;
        $slug->delete();
     
        session()->flash('success', ' Deleted Successfully!');
        return redirect()->route('admin.people.index');
    }
    public function edit(People $product)
    {

        $product = $product->load('category','sub');
        $categories = Category::latest()->get();
        return view('backend.people.edit', compact('product', 'categories'));
    }
   
    public function categories($id)
    {
        $data = Category::find($id)->sub_categories;
        return response()->json([
            'data' => $data
        ]);
    }

   

    public function update(UpdatePeopleRequest $request, People $product)
    {
            //return $request;
            $product->update([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'designation' => $request->designation,
            ]);

        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.people.index');
    }

   

   
}