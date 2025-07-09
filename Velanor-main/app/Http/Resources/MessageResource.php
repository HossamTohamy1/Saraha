<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $SenderName = '';
        if ($this->sender_id == null) {
            $SenderName = 'Anonymous';
        } else {
            $SenderName = User::find($this->sender_id)->name;
        }

        return [
            "id" => $this->id,
            "content" => $this->content,
            "image" => $this->image,
            "sender_id" => $this->sender_id,
            "sender_name" => $this->when($this->sender_id == null, fn()=>'Anonymous', fn()=>User::whereKey($this->sender_id)->value('name')),
            "receiver_id" => $this->receiver_id,
            'favorite' => $this->favorite,
            "created_at" => $this->created_at,
        ];
    }
}
