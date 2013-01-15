<?php

namespace Tdd;

class Day03Minefield
{
	//rather than using a string, use this const to represent a mine
	const MINE = '*';

	//multidimensional array, containing the source data provided to the constructor
	protected $field = array();
	//keep track of the cells we've already investigated
	protected $analysed = array();

	protected $rows = 0;
	protected $cols = 0;

	/**
	 * Constructor
	 *
	 * @param string $fieldString The input string for this mine field
	 *
	 * @return void
	 */
	public function __construct($fieldString)
	{
		$fieldStringSplit = explode("\n", $fieldString);

		if (count($fieldStringSplit) < 2)
		{
			throw new \Exception("Must be at least 1 row of mines");
		}

		$dimensions = explode(" ", $fieldStringSplit[0]);

		if (count($dimensions) != 2 || !is_numeric($dimensions[0]) || !is_numeric($dimensions[1]) || $dimensions[0] == 0 || $dimensions[1] == 0)
		{
			throw new \Exception("First line must contain 2 integers, greater than 0: cols rows");
		}

		//get rid of the dimensions
		array_shift($fieldStringSplit);

		$this->rows = (int)$dimensions[0];
		$this->cols = (int)$dimensions[1];

		if ($this->rows != count($fieldStringSplit))
		{
			throw new \Exception("Incorrect number of rows");
		}

		//build the field, and populate the mines
		$this->buildField($fieldStringSplit);
		//work out the numbers
		$this->analyseField();
	}

	/**
	 * Build the field structure
	 *
	 * @param array $mineString Mine info, per row
	 *
	 * @return void
	 */
	protected function buildField(array $mineString)
	{
		$rowCount = 0;

		while ($rowCount < $this->rows)
		{
			if ($this->cols !== strlen($mineString[$rowCount]))
			{
				throw new \Exception('Incorrect number of cols');
			}

			$row = array();
			$analysedRow = array();

			foreach (str_split($mineString[$rowCount]) AS $mineChar)
			{
				$row[] = ($mineChar === self::MINE ? self::MINE : 0);
				$analysedRow[] = false;
			}

			$this->field[] = $row;
			$this->analysed[] = $analysedRow;

			$rowCount++;
		}
	}

	/**
	 * Analyse the field, and work out how many mines are touching each area
	 *
	 * @return void
	 */
	protected function analyseField()
	{
		foreach ($this->field AS $rowIndex => $row)
		{
			foreach ($row AS $colIndex => $col)
			{
				$this->analyseCell($rowIndex, $colIndex);
			}
		}
	}

	/**
	 * Analyse a single cell - recursive
	 *
	 * @param int     $row The row
	 * @param int     $col The col
	 * @param boolean $inc Should we increment this cell, if required?
	 *
	 * @return void
	 */
	protected function analyseCell($row, $col, $inc = null)
	{
		if ($this->analysed[$row][$col])
		{
			return;
		}

		//abort if out-of-bounds
		if ($row < 0 || $col < 0 || $row >= $this->rows || $col >= $this->cols)
		{
			return;
		}

		$cell = $this->field[$row][$col];

		if ($cell === self::MINE)
		{
			$this->analysed[$row][$col] = true;

			$this->analyseCell($row - 1, $col, true); // N
			$this->analyseCell($row - 1, $col + 1, true); // NE
			$this->analyseCell($row, $col + 1, true); // E
			$this->analyseCell($row + 1, $col + 1, true); // SE
			$this->analyseCell($row + 1, $col, true); // S
			$this->analyseCell($row + 1, $col - 1, true); // SW
			$this->analyseCell($row, $col - 1, true); // W
			$this->analyseCell($row - 1, $col - 1, true); // NW
		}
		elseif ($inc)
		{
			$this->field[$row][$col]++;
		}
	}

	/**
	 * Outputs a string version of this field
	 *
	 * @return string
	 */
	public function getMineFieldString()
	{
		$str = "";

		foreach ($this->field AS $row)
		{
			$str .= implode($row) . "\n";
		}

		return trim($str);
	}
}
