<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Product extends Model
{
    /**
     * Relationship between Product and Review
     * One to Many Relationship: A product can have many reviews
     * @return object
     */

     public function reviews() {
         return $this->hasMany(Review::class);
     }
}
