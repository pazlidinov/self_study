<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'title' => $this->name,
            'img'=>$this->img,
            'body'=>$this->body,
            'view'=>$this->view,
            'user_id' => $this->user,
            'category_id'=>$this->category,
            'comments'=>$this->comments,
        ];
    }
}
