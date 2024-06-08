<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            'comment'=>$this->comment,
            'created_at'=>$this->created_at,
            'user_id' => $this->user,
            'article_id' => $this->article,
            'replaycomments'=>$this->replay_comments,
        ];
    }
}
