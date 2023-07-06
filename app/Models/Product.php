<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Unity;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    

        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        public function subcategory()
        {
            return $this->belongsTo(Subcategory::class);
        }
        public function brand()
        {
            return $this->belongsTo(Brand::class);
        }
        public function unity()
        {
            return $this->belongsTo(Unity::class);
        }
        public function size()
        {
            return $this->belongsTo(Size::class);
        }
        public function color()
        {
            return $this->belongsTo(Color::class);
        }
       public static function catProductCount($cat_id){
            $catCount=Product::where('cat_id',$cat_id)->where('status',1)->count();
            return $catCount;
       }
       public static function subcatProductCount($subcat_id){
        $subcatCount=Product::where('subcat_id',$subcat_id)->where('status',1)->count();
        return $subcatCount;
   }
   public static function brandProductCount($brand_id){
    $brandCount=Product::where('brand_id',$brand_id)->where('status',1)->count();
    return $brandCount;
}
}
