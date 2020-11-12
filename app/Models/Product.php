<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded = [];
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    } 
       public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
            ->withTimestamps();
    }
    
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function delete()
    {
        $this->images()->delete();
        return parent::delete();
    }
}
