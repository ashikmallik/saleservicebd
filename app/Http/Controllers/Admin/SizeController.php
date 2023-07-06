<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $sizes = Size::all();
        return view('backend.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'size' => 'required',

        ]);
       
        $size = new Size();
        $size->size = $request->size;
        $size->save();
        // Alert::success('Data insert Successfully', 'Success Message');

        return redirect()->route('size.index');
    }

    /**
     * Display the specified resource.
     */
    public function size_change_status(Size $size)
    {
        if ($size->status==1) {
            $size->update(['status'=>0]);
        }else{
            $size->update(['status'=>1]);
        }
        return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size = Size::find($id);
       return view('backend.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'size' => 'required',
            

        ]);
        $size = Size::find($id);

        $size->size = $request->size;
        $size->save();
        // Alert::success('Data updated Successfully', 'Success Message');

        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::find($id);
        $size->delete();
        // Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }
}
