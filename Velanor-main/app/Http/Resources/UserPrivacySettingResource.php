<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPrivacySettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    
        return [
            "user_id"=> $this->user_id,
            'isAllowedMessage'=>$this->isAllowedMessage,
            'acceptImage'=>$this->acceptImage,
            'allowUnRegisteredToSendMessage'=>$this->allowUnRegisteredToSendMessage,
            'allowToReceiveEmailNotifications'=>$this->allowToReceiveEmailNotifications,
        ];
    }
}
