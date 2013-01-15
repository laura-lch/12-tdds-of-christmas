<?php

namespace Tdd;

class Day03MinefieldTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * get a list of stats objects for passing to our test functions
	 * a side effect of this approach means that we need to define all params for all tests that use this data, even if those params are not used in the tests in qestion
	 *
	 * @return array
	 */
	public static function dataProvider()
	{
		// stats, min, max, count, average
		return array(
			array("3 4
*...
..*.
....", "*211
12*1
0111"
			),
		);
	}

	/**
	 * test exception 1
	 *
	 * @return void
	 */
	public function testColsRowsException()
	{
		$this->setExpectedException('\Exception', "First line must contain 2 integers, greater than 0: cols rows");

		$fieldString = "3
*...
..*.
....";

		$field = new Day03Minefield($fieldString);
	}

	/**
	 * test exception 2
	 *
	 * @return void
	 */
	public function testStringsException()
	{
		$this->setExpectedException('\Exception', "First line must contain 2 integers, greater than 0: cols rows");

		$fieldString = "*...
..*.
....";

		$field = new Day03Minefield($fieldString);
	}

	/**
	 * test exception 3
	 *
	 * @return void
	 */
	public function testNoMinesException()
	{
		$this->setExpectedException('\Exception', "Must be at least 1 row of mines");

		$fieldString = "1 1";

		$field = new Day03Minefield($fieldString);
	}

	/**
	 * test exception 4
	 *
	 * @return void
	 */
	public function testWrongRowsException()
	{
		$this->setExpectedException('\Exception', "Incorrect number of rows");

		$fieldString = "3 3
*..
..*";

		$field = new Day03Minefield($fieldString);
	}

	/**
	 * test exception 5
	 *
	 * @return void
	 */
	public function testWrongColsException()
	{
		$this->setExpectedException('\Exception', "Incorrect number of cols");

		$fieldString = "3 3
*..
..*
..";

		$field = new Day03Minefield($fieldString);
	}

	/**
	 * Test the inputs
	 *
	 * @param string $fieldString The input string for this mine field
	 * @param string $expected    The expected response
	 *
	 * @dataProvider dataProvider
	 *
	 * @return void
	 */
	public function testConvert($fieldString, $expected)
	{
		$field = new Day03Minefield($fieldString);

		$this->assertEquals($expected, $field->getMineFieldString());
	}
}

