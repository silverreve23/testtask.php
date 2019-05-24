<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassResource extends JsonResource
{
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'day' => $this->day,
            'time' => $this->time,
            'teacher_id' => $this->teacher_id,
        );
    }
}
