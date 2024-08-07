<?php

namespace App\Http\Resources;

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
        return([
            'full_name'=>$this->name,
            'phone_number'=>$this->phone_number,
            'img'=>$this->img,
            'articles'=>$this->articles,
            'comments'=>$this->comments,
            'replaycomments'=>$this->replaycomments,
        ]);
    }
}
