<?php

namespace App\App\Cart;

use Money\Currencies\ISOcurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money as BaseMoney;
use NumberFormatter;

class Money {
	protected $money;
	public function __construct($value) {
		$this->money = new BaseMoney($value, new Currency('USD'));
	}
	public function amount() {
		return $this->money->getAmount();
	}
	public function formatted() {
		$numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
		$currencies = new ISOcurrencies();
		$formatter = new IntlMoneyFormatter($numberFormatter, $currencies);
		return $formatter->format($this->money);
	}
}