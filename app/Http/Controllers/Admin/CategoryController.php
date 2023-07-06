<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $Categories = Category::all();
        return view('backend.category.index',compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            

        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/category')){
                mkdir('uploads/category', 077, true);
            }
            $image->move('uploads/category',$imagename);
        }else{
            $imagename = 'default.png';
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imagename;
        $category->save();
        // Alert::success('Data insert Successfully', 'Success Message');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Category $category)
    {
        if ($category->status==1) {
            $category->update(['status'=>0]);
        }else{
            $category->update(['status'=>1]);
        }
        return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
       return view('backend.category.edit',compact('category'));
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
        $category = Category::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);

        

        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/category')){
                mkdir('uploads/category', 077, true);
            }
            $image->move('uploads/category',$imagename);
        }else{
            $imagename = $category->image;
        }

        
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imagename;
        $category->save();
        // Alert::success('Data updated Successfully', 'Success Message');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (file_exists('uploads/category/'.$category->image)) {
            unlink('uploads/category/'.$category->image);
        }

        $category->delete();
        // Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }
}
