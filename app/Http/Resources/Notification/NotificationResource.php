<?php

namespace App\Http\Resources\Notification;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class NotificationResource extends JsonResource
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
            'id' => $this->getRawOriginal('id'),
            'type' => $this->type,
            'notifiable_type' => $this->notifiable_type,
            'notifiable_id' => $this->notifiable_id,
            'data' => json_decode($this->data, true),
            'read_at' => $this->read_at,
            'created_at_format' => Carbon::parse($this->created_at)->diffForHumans(),
            'created_at' => $this->created_at
        ];
    }
}
