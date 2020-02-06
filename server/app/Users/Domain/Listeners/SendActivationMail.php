<?php

namespace App\Users\Domain\Listeners;

use App\Users\Domain\Events\UserWasRegistered;
use App\Users\Domain\Mails\Activate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendActivationMail implements ShouldQueue {
	public function handle(UserWasRegistered $event) {
		Mail::to($event->user)->send(new Activate($event->user, $event->user->activation));
	}
}
