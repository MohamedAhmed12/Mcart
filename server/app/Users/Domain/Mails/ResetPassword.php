<?php

namespace App\Users\Domain\Mails;

use App\Users\Domain\Models\Reminder;
use App\Users\Domain\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable {
	use Queueable, SerializesModels;
	public $user;
	public $token;

	public function __construct(User $user, Reminder $reminder) {
		$this->user = $user;
		$this->token = $reminder->token;
	}

	public function build() {
		return $this->markdown('mails.resetpassword');
	}
}
