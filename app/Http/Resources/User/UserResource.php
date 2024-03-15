<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'email' => isset($this->email) ? $this->email : null,
            'country_code' => isset($this->country_code) ? $this->country_code : null,
            'mobile_no' => isset($this->mobile_no) ? $this->mobile_no : null,
        ];
    }
}
