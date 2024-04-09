<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, "category_id"); // corrected "catergory_id" to "category_id"
    }

    public function brand(){
        return $this->belongsTo(Brand::class, "brand_id"); // Assuming you have a Brand model, corrected "Category::class" to "Brand::class"
    }
}
