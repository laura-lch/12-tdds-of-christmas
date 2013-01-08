<?php

namespace Tdd;

class Day01CalcStatsTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * object creation test
	 *
	 * @return void
	 */
	public function testObjectCreation()
	{
		new Day01CalcStats(array(1, 2, 3));
	}

	/**
	 * get a list of stats objects for passing to our test functions
	 * a side effect of this approach means that we need to define all params for all tests that use this data, even if those params are not used in the tests in qestion
	 *
	 * @return array
	 */
	public static function calcStatsProvider()
	{
		// stats, min, max, count, average
		return array(
			array(new Day01CalcStats(array(6, 9, 15, -2, 92, 11)), -2, 92, 6, 21.833333),
			array(new Day01CalcStats(array(1, 3)), 1, 3, 2, 2),
			array(new Day01CalcStats(array(0, 0, 0, 0, 0)), 0, 0, 5, 0),
		);
	}

	/**
	 * test exception 1
	 *
	 * @return void
	 */
	public function testEmptySequenceThrowsException()
	{
		$this->setExpectedException('\Exception', '$sequence array must contain at least two elements');
		new Day01CalcStats(array());
	}

	/**
	 * test exception 2
	 *
	 * @return void
	 */
	public function testSequenceWithSingleElementThrowsException()
	{
		$this->setExpectedException('\Exception', '$sequence array must contain at least two elements');
		new Day01CalcStats(array(1));
	}

	/**
	 * Test the getting of the min value
	 *
	 * @param Day01CalcStats $stats   The object
	 * @param int            $min     The min value expected
	 * @param int            $max     The max value expected
	 * @param int            $count   The count expected
	 * @param int            $average The average expected
	 *
	 * @dataProvider calcStatsProvider
	 *
	 * @return void
	 */
	public function testGetMinimumValue(Day01CalcStats $stats, $min, $max, $count, $average)
	{
		$this->assertEquals($min, $stats->getMinimumValue());
	}

	/**
	 * Test the getting of the max value
	 *
	 * @param Day01CalcStats $stats   The object
	 * @param int            $min     The min value expected
	 * @param int            $max     The max value expected
	 * @param int            $count   The count expected
	 * @param int            $average The average expected
	 *
	 * @dataProvider calcStatsProvider
	 *
	 * @return void
	 */
	public function testGetMaximumValue(Day01CalcStats $stats, $min, $max, $count, $average)
	{
		$this->assertEquals($max, $stats->getMaximumValue());
	}

	/**
	 * Test the counting of elements
	 *
	 * @param Day01CalcStats $stats   The object
	 * @param int            $min     The min value expected
	 * @param int            $max     The max value expected
	 * @param int            $count   The count expected
	 * @param int            $average The average expected
	 *
	 * @dataProvider calcStatsProvider
	 *
	 * @return void
	 */
	public function testCountElements(Day01CalcStats $stats, $min, $max, $count, $average)
	{
		$this->assertEquals($count, $stats->countElements());
	}

	/**
	 * Test the average value
	 *
	 * @param Day01CalcStats $stats   The object
	 * @param int            $min     The min value expected
	 * @param int            $max     The max value expected
	 * @param int            $count   The count expected
	 * @param int            $average The average expected
	 *
	 * @dataProvider calcStatsProvider
	 *
	 * @return void
	 */
	public function testGetAverageValue(Day01CalcStats $stats, $min, $max, $count, $average)
	{
		$this->assertEquals($average, $stats->getAverageValue());
	}
}

