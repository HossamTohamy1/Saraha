<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      

    
        if($this['user'] == null){
            return [
                "id"=> $this->id,
                "name"=> $this->name,
                "email"=> $this->email,
                "username"=> $this->username,
                "image"=> $this ->image,
                "isHidden" => $this->isHidden,
            ];
        }else{

            return [
                "id"=> $this['followinfo']->id,
                "name"=> $this['user']->name,
                "email"=> $this['user']->email,
                "username"=> $this['user']->username,
                "image"=> $this['user'] ->image,
                "isHidden" => $this['followinfo']->isHidden,
            ];
        }
    }
}
