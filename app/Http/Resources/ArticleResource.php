<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => str($this->content)->limit(50),
            'created_at' => $this->created_at->format('d.m.Y'),
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ]
        ];
    }
}
