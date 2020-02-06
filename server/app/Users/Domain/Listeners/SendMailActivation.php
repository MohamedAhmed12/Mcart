<?php

namespace App\Users\Domain\Listeners;

use App\Users\Domain\Events\UserWasRegistered;
use App\Users\Domain\Mails\Activate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendMailActivation implements ShouldQueue {
	public function handle(UserWasRegistered $event) {
		dd(55555555555);
		Mail::to($event->user)->send(new Activate($event->user, $event->user->activation->first()));
	}
}
