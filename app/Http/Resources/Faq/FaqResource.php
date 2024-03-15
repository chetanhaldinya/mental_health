<?php

namespace App\Http\Resources\Faq;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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
            'question' => $this->question,
            'answer' => $this->answer,
            // 'section_type' => $this->section_type,
            // 'section_id' => $this->section_id,
            // 'is_answered' => $this->is_answered,
            'question_from' => isset($this->questionFromUser) ? new UserResource($this->questionFromUser) : (object)[],
            'answered_by' => isset($this->answeredByUser) ? new UserResource($this->answeredByUser) : (object)[],
            'duration' => get_default_format($this->created_at),


        ];
    }
}
