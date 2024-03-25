<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'seller' => new SellerResource($this->seller),
            'sale_date' => date('d/m/Y', strtotime($this->sale_date)),
            'value' => 'R$ ' . number_format($this->value, 2, ',', '.'),
        ];
    }
}
