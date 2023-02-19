<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Seller;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'price', 'category_id', 'seller_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
    }
}
