<?php

namespace App\Users\Domain\Mails;

use App\Users\Domain\Models\Activation;
use App\Users\Domain\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Activate extends Mailable {
	use Queueable, SerializesModels;
	public $user;
	public $token;
	public function __construct(User $user, Activation $activation) {
		$this->user = $user;
		$this->token = $activation->token;

	}

	public function build() {
		return $this->markdown('mails.activate');
	}
}
