<?php

namespace Tdd;

class Day02NumberNames
{
	protected $map = array(
		1 => 'one',
		2 => 'two',
		3 => 'three',
		4 => 'four',
		5 => 'five',
		6 => 'six',
		7 => 'seven',
		8 => 'eight',
		9 => 'nine',
		10 => 'ten',
		11 => 'eleven',
		12 => 'twelve',
		13 => 'thirteen',
		14 => 'fourteen',
		15 => 'fifteen',
		16 => 'sixteen',
		17 => 'seventeen',
		18 => 'eighteen',
		19 => 'nineteen',
		20 => 'twenty',
		30 => 'thirty',
		40 => 'forty',
		50 => 'fifty',
		60 => 'sixty',
		70 => 'seventy',
		80 => 'eighty',
		90 => 'ninety',
	);

	protected $units = array(
		0 => null,
		1 => null,
		2 => ' thousand',
		3 => ' million',
		4 => ' billion',
		5 => ' trillion',
	);

	/**
	 * convert an int into a string
	 *
	 * @param int $num the number
	 *
	 * @return string
	 */
	public function convert($num)
	{
		if (!is_int($num))
		{
			throw new \Exception('$num must be an integer');
		}

		if ($num == 0)
		{
			return 'zero';
		}

		if (isset($this->map[$num]))
		{
			return $this->map[$num];
		}

		$triplets = explode(',', number_format($num));
		$count = count($triplets);

		//the final set of triplets, that will be returned to the user in string form
		$finalTriplets = array();

		//now, loop through the triplets, building the final string as required
		foreach ($triplets AS $triplet)
		{
			$paddedNumber = sprintf('%03d', $triplet);

			$hundreds = $this->getHundreds($paddedNumber);
			$tens = $this->getTens(substr($paddedNumber, 1));

			$temp = $hundreds . $tens;

			if ($hundreds && $tens)
			{
				$temp = $hundreds . ' and ' . $tens;
			}

			$temp .= $this->units[$count--];

			if ($temp)
			{
				$finalTriplets[] = $temp;
			}
		}

		return implode(", ", $finalTriplets);
	}

	/**
	 * Converts the hundreds place into English words
	 *
	 * @param int $hundreds Three digit integer
	 *
	 * @return string Hundreds number in English in the form of 'n hundred'
	 */
	protected function getHundreds($hundreds)
	{
		$string = null;

		if ($hundreds[0])
		{
			$string = $this->map[$hundreds[0]] . ' hundred';
		}

		return $string;
	}

	/**
	 * Converts the tens numbers into English words
	 *
	 * @param int $tens Two digit integer
	 *
	 * @return string Tens in English. Can be one - ninety nine
	 */
	protected function getTens($tens)
	{
		if (array_key_exists($tens, $this->map))
		{
			return $this->map[$tens];
		}

		$temp = null;

		if ($tens[0] > 0)
		{
			$temp .= $this->map[$tens[0] * 10] . ' ';
		}

		if ($tens[1] > 0)
		{
			$temp .= $this->map[$tens[1]];
		}

		return $temp;
	}
}
