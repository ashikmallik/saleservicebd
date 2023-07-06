<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $colors = Color::all();
        return view('backend.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'color' => 'required',

        ]);
       
        $color = new Color();
        $color->color = $request->color;
        $color->save();
        // Alert::success('Data insert Successfully', 'Success Message');

        return redirect()->route('color.index');
    }

    /**
     * Display the specified resource.
     */
    public function color_change_status(Color $color)
    {
        if ($color->status==1) {
            $color->update(['status'=>0]);
        }else{
            $color->update(['status'=>1]);
        }
        return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = Color::find($id);
       return view('backend.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'color' => 'required',
            

        ]);
        $color = Color::find($id);

        $color->color = $request->color;
        $color->save();
        // Alert::success('Data updated Successfully', 'Success Message');

        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();
        // Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }
}
