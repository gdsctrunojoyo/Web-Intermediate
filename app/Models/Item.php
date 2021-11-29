<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function photos() {
        return $this->hasMany(ItemPhoto::class, 'id_item', 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function getDetailUrlAttribute() {
        return route('shop.detail', [
            'id'    => $this->id,
            'slug'  => $this->slug
        ]);
    }

    public function getCoverUrlAttribute() {
        $photo = $this->photos()->first();
        if ($photo) {
            return $photo->photo_url;
        }
        return url('img/product_default.png');
    }
    
    public function getLastEditedAttribute() {
        return $this->updated_at->diffForHumans();
    }
}
