<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    public $timestamps = false;

    use HasFactory;

    // relationship = public function {bebas}

    public function photos() {
        return $this->hasMany(ItemPhoto::class, 'id_item', 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    // attribute = public function get{bebas}Attribute

    // detail_url
    public function getDetailUrlAttribute() {
        return route('shop.detail', [
            'id'    => $this->id,
            'slug'  => $this->slug
        ]);
        // {base_url}/shop/detail/9/baju-batik-cirebon-wanita
    }

    // cover_url
    public function getCoverUrlAttribute() {
        $photo = $this->photos()->first();
        if ($photo) {
            return $photo->photo_url;
        }
        return url('img/product_default.png');
    }
    
    // last_edited
    public function getLastEditedAttribute() {
        Carbon::setLocale('id');
        return Carbon::parse($this->updated_at)->diffForHumans();
    }
}
