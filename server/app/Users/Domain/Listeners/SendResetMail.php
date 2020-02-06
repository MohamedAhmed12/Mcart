<?php

namespace App\Users\Domain\Listeners;

use App\Users\Domain\Events\PasswordForgetted;
use Illuminate\Support\Facades\Mail;

class SendResetMail {
	/**
	 * Handle the event.
	 *
	 * @param  ActivationEvent  $event
	 * @return void
	 */
	public function handle(PasswordForgetted $event) {
		dd('reset');
		Mail::to($event->user->email)->send(new ResetPassword($event->user->email, $event->user->id, $event->user->reset->token));

	}
}
