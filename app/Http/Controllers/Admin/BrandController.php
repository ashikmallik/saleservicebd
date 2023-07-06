<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $brands = Brand::all();
        return view('backend.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            

        ]);
       
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();
        // Alert::success('Data insert Successfully', 'Success Message');

        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function brand_change_status(Brand $brand)
    {
        if ($brand->status==1) {
            $brand->update(['status'=>0]);
        }else{
            $brand->update(['status'=>1]);
        }
        return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
       return view('backend.brand.edit',compact('brand'));
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
        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();
        // Alert::success('Data updated Successfully', 'Success Message');

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        // Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }
}
