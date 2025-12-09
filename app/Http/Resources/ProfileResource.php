<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $value = parent::toArray($request) ; 
        $value['image'] = url("storage/".$value['image']);
        $value['created_at'] = $this->created_at->format('d-m-Y') ;
        return $value;
    }
}
