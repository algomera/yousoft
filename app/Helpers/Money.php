<?php

	namespace App\Helpers;

	use NumberFormatter;

	class Money
	{
		public static function format($value) {
			return numfmt_format_currency(new NumberFormatter("it-IT", NumberFormatter::CURRENCY), (float)$value, "EUR");
		}

		public static function prepare($value) {
			$value = str_replace('.', '', $value);
			$value = str_replace(',', '.', $value);
			return $value;
		}
	}