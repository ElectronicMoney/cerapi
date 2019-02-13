<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Review extends Model
{
    /**
     * Relationship between Review and Product
     * Many to One Relationship: Many reviews can belong to one produt
     * @return object
     */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
