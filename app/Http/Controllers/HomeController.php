<?php

namespace App\Http\Controllers;

// use auth;
use Session;
use DB;
use App\Models\Cart;
use App\Models\Size;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Order;
use App\Models\Unity;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){

        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $unities = Unity::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = Product::where('status',1)->latest()->limit(12)->get();


        $top_sales = DB::table('products')
            ->leftJoin('orders','products.id','=','orders.product_id')
            ->selectRaw('products.id, SUM(orders.qty) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(4)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }




        return view('welcome',compact('categories','subcategories','brands','unities','sizes','colors','products','topProducts'));
    }

    public function show_product_deatails($id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $product=Product::findorFail($id);
        $sizes = Size::find($product->size_id);
        $colors = Color::find($product->color_id);
        $unities = unity::find($product->unit_id);
        $cat_id= $product->cat_id;
        $related_products= Product::where('cat_id',$cat_id)->limit(4)->get();
        return view('fontend.pages.view_product_deatails',compact('categories','subcategories','brands','product','sizes','colors','unities','related_products'));
        
    }
    

    public function product_by_cat($id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $products=Product::where('status',1)->where('cat_id',$id)->limit(9)->get();
        return view('fontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
        
    }


    public function addto_cart(Request $request, $id)
    {
        
            $product = Product::find($id);
            
            $cart = new Cart;
            $cart->name= $product->name;
            $cart->price= $product->price;
            $cart->image= $product->image;

            $cart->size= $request->size;
            $cart->color= $request->color;

            $cart->product_id= $product->id;
            
            $cart->qty=$request->qty;
            $cart->save();
            // Alert::success('product addet Successfully', 'Success Message');

            return redirect('checkout')->with('message', 'product addet Successfully');
            
    }


    public function checkout(){
        $cart=Cart::all();
        foreach ($cart as $carts) {
            $product_id= $carts->product_id;
            

            $cart =Cart::where('product_id','=',$product_id)->get();
            $total= $carts->qty*$carts->price;
            return view('fontend.pages.checkout',compact('cart','total'));
            };
            
            
        
    }
    


    // public function show_cart($id){

    //     if(auth::id()){
    //         $cart =Cart::find($id);
    //         return view('fontend.header',compact('cart'));
    //     }
    // }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        // Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->back();
    }


        public function search(Request $request){
            $products=Product::orderBy('id','desc')->where('name','LIKE','%'.$request->product.'%');
        if($request->category != "ALL") $products->where('cat_id',$request->category);
        $products= $products->get();
        $categories= Category::all();
        $subcategories= Subcategory::all();
        $brands= Brand::all();
        return view('fontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
        }

        public function cash_order(Request $request){
            
            $data=Cart::all();
    
            foreach($data as $data){
                $oder= new Order;

                $oder->coustomer_name=$request->coustomer_name;
                $oder->phone=$request->phone;
                $oder->email=$request->email;
                $oder->address=$request->address;
                $oder->city=$request->city;
                $oder->country=$request->country;
                $oder->zip_code=$request->zip_code;


                $oder->product_name=$data->name;
               
                $oder->price=$data->price;
                $oder->qty=$data->qty;
                $oder->image=$data->image;
                $oder->product_id=$data->product_id;
                $oder->total=$oder->price*$oder->qty;
    
                $oder->save();
    
                $cart_id=$data->id;
    
                $cart=Cart::find($cart_id);
    
                $cart->delete();
            }
            return redirect('success')->with('message', ' আপনার অর্ডার সফল হয়েছে । কিছুক্ষণের মধ্যে আপনার নাম্বারে কল দেওয়া হবে, ');
        }

        public function success(){
            return view('fontend.pages.success');
        }


}
