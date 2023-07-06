<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $unitys = Unity::all();
        return view('backend.unity.index',compact('unitys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.unity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            

        ]);
       
        $unity = new Unity();
        $unity->name = $request->name;
        $unity->description = $request->description;
        $unity->save();
        // Alert::success('Data insert Successfully', 'Success Message');

        return redirect()->route('unity.index');
    }

    /**
     * Display the specified resource.
     */
    public function unity_change_status(Unity $unity)
    {
        if ($unity->status==1) {
            $unity->update(['status'=>0]);
        }else{
            $unity->update(['status'=>1]);
        }
        return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unity = Unity::find($id);
       return view('backend.unity.edit',compact('unity'));
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
        $unity = Unity::find($id);

        $unity->name = $request->name;
        $unity->description = $request->description;
        $unity->save();
        // Alert::success('Data updated Successfully', 'Success Message');

        return redirect()->route('unity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unity = Unity::find($id);
        $unity->delete();
        // Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }
}
