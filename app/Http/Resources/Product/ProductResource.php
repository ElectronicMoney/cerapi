<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->detail,
            'originalPrice' => $this->price,
            'currentPrice' => round($this->price - ($this->discount * $this->price / 100), 2),
            'stock' => $this->stock == 0 ? 'Out of stock': $this->stock,
            'discount' => $this->discount . '%',
            'firstUpload' => $this->created_at,
            'lastUpdate' => $this->updated_at,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count()): 'No rating found!',
            'href' => [
                'reviews' => route('reviews.index', $this->id),
            ],
        ];
    }
}


