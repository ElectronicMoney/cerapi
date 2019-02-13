<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'productId' => $this->product_id,
            'customer' => $this->customer,
            'body' => $this->review,
            'star' => $this->star,
        ];
    }
}
