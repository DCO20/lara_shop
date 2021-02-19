<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'price', 'about', 'description', 'image'];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * Cateroies not linked with this product
     */
    public function categoriesAvailable($filter = null)
    {
        $categories = Category::whereNotIn('categories.id', function($query) {
            $query->select('category_product.category_id');
            $query->from('category_product');
            $query->whereRaw("category_product.product_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('categories.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $categories;
    }
}