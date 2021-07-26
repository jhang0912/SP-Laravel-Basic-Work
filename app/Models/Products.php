<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class Products extends Model
{
    use HasFactory;

    /* attributes */
    protected $fillable = [
        'cht_name',
        'en_name',
        'mvp',
        'content',
        'equipment',
        'price',
        'quantity',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /* Relationships */
    public function cart_items()
    {
        return $this->hasMany(Cart_items::class);
    }

    public function images()
    {
        return $this->morphMany(Images::class, 'source');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user', 'product_id');
    }

    /* function */
    static function checkProductQuantity($product)
    {
        $quantity = Products::find($product->id)->quantity; //取得商品庫存數量

        if ($product->quantity > $quantity) { //比對選購數量否超過庫存數量
            return false;
        } else {
            return true;
        }
    }

    public function getImageUrlAttribute()
    {
        $images = $this->images->last();
        if (isset($images)) {
            return Storage::url($images->path);
        }
    }

    static function getAdminProducts($offset)
    {
        $products = Products::offset($offset)->limit(10)->get();

        foreach ($products as $product) {
            if (isset($product->image_url)) {
                $product['image'] = $product->image_url;
            }
        }

        return $products;
    }

    static function getHomeProducts()
    {
        $products = Products::orderby('price')->get();
        $classified_products = $products->groupby('mvp');

        foreach ($classified_products as $products) {
            foreach ($products as $product) {
                if (isset($product->image_url)) {
                    $product['image'] = $product->image_url;
                }
            }
        }

        return $classified_products;
    }
}
