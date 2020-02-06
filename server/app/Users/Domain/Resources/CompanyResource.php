<?php

namespace App\Users\Domain\Resources;

use App\App\Domain\Resources\BaseResource;

class CompanyResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge([
            'id' => $this->id,
            'name' => $this->name,
            'user' => new UserResource($this->whenLoaded('user')),
        ], parent::toArray($request));
    }
}
