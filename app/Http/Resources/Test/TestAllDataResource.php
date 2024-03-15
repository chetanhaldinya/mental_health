<?php

namespace App\Http\Resources\Test;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TestAllDataResource extends JsonResource
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
            'user' => $this->user->count() > 0 ? new UserResource($this->user) : (object)[],
            // 'files'=> $this->storyFiles->count() > 0 ? TestFileResource::collection($this->storyFiles) : [],
            'message' => isset($this->message) ? $this->message : null,
            'duration' => $this->created_at->diffForHumans(),

        ];
    }
}
