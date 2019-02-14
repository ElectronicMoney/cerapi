<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\User;

class Product extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'price',
        'stock',
        'discount',
    ];

    /**
     * Relationship between Product and Review
     * One to Many Relationship: A product can have many reviews
     * @return object
     */

     public function reviews() {
         return $this->hasMany(Review::class);
     }

     public function user() {
         return $this->belongsTo(User::class);
     }
}
