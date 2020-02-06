<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class CreateUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|min:4|max:40|string',
            'last_name' => 'required|min:4|max:40|string',
            'username' => 'required|min:6|max:32|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:32|confirmed',
            // role slug.
            'slug' => [
                'required',
                'exists:roles,slug',
            ],
        ];
    }
}
