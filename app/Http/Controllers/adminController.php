<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function dashboard()
    {
      $usertype=Auth::User()->usertype;
      if($usertype=='1'){
         $totalProduct=Product::count();
         $totalCategory=Category::count();
         $totalBrand=Brand::count();
         $totalAdmin = User::where('usertype','1')->count();

         // $todayDate = Carbon::now()->format('d-m-Y');
         // $thisMonth = Carbon::now()->format('m');
         // $thisYear = Carbon::now()->format('Y');

         $totalOrder = Order::count();

         // $todayOrder = Order::whereDate('created_at',$todayDate)->count();
         // $thisMonthOrder = Order::whereMonth('cteated_at',$thisMonth)->count();
         // $thisYearOrder = Order::whereYear('created_at',$thisYear)->count();

         return view('dashboard',compact('totalProduct','totalCategory','totalBrand','totalAdmin','totalOrder'));
      }
      else{
         return view('welcome');
      }
      
}
   public function order(){
      $order = Order::all();
      return view('backend.order.order', compact('order'));
   }


   public function print_pdf($id){
      $order=Order::find($id);
      $pdf = PDF::loadView('backend.pdf',compact('order'));
    
      return $pdf->download('saleservicebd.pdf');
   }

}
