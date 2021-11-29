<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPhoto extends Model
{
    use HasFactory;

    public function item() {
        return $this->belongsTo(Item::class);
    }

    // run php artisan storage:link first
    public function getPhotoUrlAttribute() {
        return asset('storage/' . $this->src);
    }
}
