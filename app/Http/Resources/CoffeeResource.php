<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoffeeResource extends JsonResource
{
    public $status;
    public $message;


    public function __construct($resource, $status, $message)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // return [
        //     '_id'         => $this->_id,
        //     'id'          => $this->item_id,     
        //     'name'        => $this->item_name,    
        //     'category'    => $this->category,    
        //     'price'       => $this->price,        
        //     'is_seasonal' => $this->is_seasonal,  
        // ];

        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource,
    
        ];
    }
}