<?php

namespace App\Http\Resources\Test;

use Illuminate\Http\Resources\Json\JsonResource;

class TestFileResource extends JsonResource
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
            'file_type' => isset($this->file_type) ? $this->file_type : null,
            'file_name' => isset($this->file_name) ? $this->file_name : null,
            'caption' => isset($this->caption) ? $this->caption : null,
        ];
    }
}
