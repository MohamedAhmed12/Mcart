<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Contracts\ServiceInterface;
use App\App\Domain\Payloads\GenericPayload;
use App\Users\Domain\Pipelines\AttachUserToRolePipeline;
use App\Users\Domain\Pipelines\CreateActivationTokenForUserPipeline;
use App\Users\Domain\Pipelines\CreateUserPipeline;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;

class RegisterUserService implements ServiceInterface
{
    public function handle($data = [])
    {
        $data['password'] = bcrypt($data['password']);
        $data['utm_token'] = Str::random(32);
        $pipes = [
            CreateUserPipeline::class,
            CreateActivationTokenForUserPipeline::class,
            AttachUserToRolePipeline::class,
        ];
        $user = app(Pipeline::class)->send($data)->through($pipes)->then(function ($user) {
            return $user;
        });
        return new GenericPayload($user);
    }
}
