<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourceCollection extends JsonResource
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
            'name' => $this->name,
            'originalPrice' => $this->price,
            'currentPrice' => round($this->price - ($this->discount * $this->price / 100), 2),
            'discount' => $this->discount . '%',
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count()) : 'No rating found!',
            'href' => [
                'link' => route('products.show', $this->id),
            ],
        ];
    }
}
