<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Category::all();
        return view('backend.subcategory.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            

        ]);
        
        $subcategory = new Subcategory();
        $subcategory->cat_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->save();
        // Alert::success('Data insert Successfully', 'Success Message');

        return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function subchange_status(Subcategory $subcategory)
    {
        if ($subcategory->status==1) {
            $subcategory->update(['status'=>0]);
        }else{
            $subcategory->update(['status'=>1]);
        }
        return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $category = Category::all();
         $subcategory = Subcategory::find($id);
       return view('backend.subcategory.edit', compact('category'), compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',

        ]);
        $subcategory = Subcategory::find($id);
    
        
        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->category;
        $subcategory->description = $request->description;
        $subcategory->save();
        // Alert::success('Data updated Successfully', 'Success Message');

        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
