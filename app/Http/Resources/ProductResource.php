<?php

namespace App\Http\Resources;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray( $request)
    {
       return[
        'attributes'=>[

            'id'=>(int)$this->id,
            'name'=>(string)$this->name,
            'category_id'=>(int)$this->category_id,
            'desc'=>(string)$this->desc,
            'price'=>(float)$this->price,
            'image'=>(string)$this->image,
            'created_at'=>(string)$this->created_at,
        ],
            'realtions'=>[
                'category'=>$this->category,
            ],


       ];
    }
}
