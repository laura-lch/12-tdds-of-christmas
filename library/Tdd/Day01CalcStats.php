<?php

namespace Tdd;

class Day01CalcStats
{
	protected $sequence;

	/**
	 * constructor
	 *
	 * @param array $sequence The sequence
	 *
	 * @return void
	 */
	public function __construct(array $sequence)
	{
		if (count($sequence) < 2)
		{
			throw new \Exception('$sequence array must contain at least two elements');
		}

		$this->sequence = $sequence;
	}

	/**
	 * Gets the minimum value
	 *
	 * @return int
	 */
	public function getMinimumValue()
	{
		return min($this->sequence);
	}

	/**
	 * Gets the maximum value
	 *
	 * @return int
	 */
	public function getMaximumValue()
	{
		return max($this->sequence);
	}

	/**
	 * Returns the number of elements
	 *
	 * @return int
	 */
	public function countElements()
	{
		return count($this->sequence);
	}

	/**
	 * Gets the average of the current elements, to 6 decimal places
	 *
	 * @return double
	 */
	public function getAverageValue()
	{
		return number_format(array_sum($this->sequence) / $this->countElements(), 6);
	}
}
