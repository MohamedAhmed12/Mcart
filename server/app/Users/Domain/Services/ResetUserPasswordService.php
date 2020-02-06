<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\ReminderRepository;

class ResetUserPasswordService extends Service
{
    protected $reminders;
    public function __construct(ReminderRepository $reminders)
    {
        $this->reminders = $reminders;
    }
    public function handle(User $user = null, $token = null, $data = [])
    {
        if ($this->reminders->complete($user, $token)) {
            $user->update([
                'password' => bcrypt($data['password']),
            ]);
            return new GenericPayload([
                'message' => 'Password Has been changed successfully !',
            ], 201);
        }
    }
}
