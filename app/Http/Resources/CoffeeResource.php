<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoffeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    
        return [
            '_id'         => $this->_id,
            'id'          => $this->item_id,     
            'name'        => $this->item_name,    
            'category'    => $this->category,    
            'price'       => $this->price,        
            'is_seasonal' => $this->is_seasonal,  
        ];
    }
}