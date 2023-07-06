<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Unity;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $unities = Unity::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('backend.product.create',compact('categories','subcategories','brands','unities','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            
            'price' => 'required',
            

        ]);
        
        $fileNames=[];
            foreach($request->file('file') as $image){
                $imageName = $image->getClientOriginalName();
                $image->move(public_path().'/uploads/product/',$imageName);
                $fileNames[] = $imageName;

            }
        $product = new Product();
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->brand_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = $request->size;
        $product->color_id = $request->color;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product['image'] = implode('|',$fileNames);
        $product->save();
            // Alert::success('Data insert Successfully', 'Success Message');
    
            return redirect()->route('product.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function product_change_status(Product $product)
    {
        if ($product->status==1) {
            $product->update(['status'=>0]);
        }else{
            $product->update(['status'=>1]);
        }
        return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);


        $product->delete();
        // Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }
}
