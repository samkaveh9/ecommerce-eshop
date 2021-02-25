<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Order;

class Product extends Model
{
    use Sluggable;
  protected $fillable = [
      'category_id','subcategory_id','brand_id','product_name','slug',
      'code','quantity','size','color','detail','images', 'selling_price',
      'discount_price','special_offers','main_slider','mid_slider',
      'amazing_offer','best_sellers','selected_products','most_visited'
      ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
   }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getBrandNameAttribute()
    {
        return $this->brand->name;
    }

    public function getSubcategoryNameAttribute()
    {
        return $this->subcategory->name;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
