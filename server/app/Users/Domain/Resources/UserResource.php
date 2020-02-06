<?php

namespace App\Users\Domain\Resources;

use App\Ads\Domain\Resources\AdResource;
use App\App\Domain\Resources\BaseResource;
use App\Users\Domain\Resources\CompanyResource;

class UserResource extends BaseResource
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
            'email' => $this->email,
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'company' => new CompanyResource($this->whenLoaded('company')),
            'permissions' => $this->getPermissions()->toArray(),
            'utm_token' => $this->utm_token,
            'ads' => AdResource::collection($this->whenLoaded('ads')),
            'soldier_ads' => AdResource::collection($this->whenLoaded('soldierAds')),
        ], parent::toArray($request));
    }
}
