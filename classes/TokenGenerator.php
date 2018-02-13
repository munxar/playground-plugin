<?php namespace Jazz\Playground\Classes;


class TokenGenerator {

	/**
	 * This function will generate a random String based on the given length and letters in the variables
	 * @param $length
	 * Will take a number which defines the length of the generated String
	 *
	 * @param $alphabet
	 * Will take a String which contains all letters which can appear in the String
	 *
	 * @return string
	 * Will return the generated String
	 */
	public static function generate($defaultLength, $defaultAlphabet, $length, $alphabet){

		if ($length == ""){
			$length = $defaultLength;
		}
		if ($alphabet == ""){
			$alphabet = $defaultAlphabet;
		}

		$alphabetLength = strlen($alphabet);
		$randomToken = '';
		for ($i = 0; $i < $length; $i++) {
			$randomToken .= $alphabet[rand(0, $alphabetLength - 1)];
		}
		return $randomToken;
	}
}
