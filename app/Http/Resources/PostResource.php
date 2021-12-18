<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $published_at = '';

        if ($this->published_at == "") {
            $published_at = "-";
        } else {
            $published_at = $this->published_at->format('j F Y');
        }
        return [
            "category" => new CategoryResource($this->category),
            "user" =>  new UserResource($this->user),
            "title" =>  $this->title,
            "slug" => $this->slug,
            "image800x549" => $this->image800x549,
            "assets/storage/uploads/posts/800x549/image-1639179812aj.JPG",
            "content" => \Illuminate\Support\Str::limit($this->content, 200, $end = '....'),
            "published_at" => $published_at,
        ];
    }
}
