<?php

namespace Tdd;

class Day02NumberNamesTest extends \PHPUnit_Framework_TestCase
{
	protected $numberNames;

	/**
	 * setup
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->numberNames = new Day02NumberNames();
	}

	/**
	 * tear down
	 *
	 * @return void
	 */
	protected function tearDown()
	{
		$this->object = null;
	}

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
			array(0, 'zero'),
			array(5, 'five'),
			array(12, 'twelve'),
			array(67, 'sixty seven'),
			array(99, 'ninety nine'),
			array(300, 'three hundred'),
			array(804, 'eight hundred and four'),
			array(220, 'two hundred and twenty'),
			array(645, 'six hundred and forty five'),
			array(118, 'one hundred and eighteen'),
			array(1000, 'one thousand'),
			array(1501, 'one thousand, five hundred and one'),
			array(12609, 'twelve thousand, six hundred and nine'),
			array(512607, 'five hundred and twelve thousand, six hundred and seven'),
			array(43112603, 'forty three million, one hundred and twelve thousand, six hundred and three')
		);
	}

	/**
	 * test exception 1
	 *
	 * @return void
	 */
	public function testNoIntThrowsException()
	{
		$this->setExpectedException('\Exception', '$num must be an integer');
		$this->numberNames->convert('2');
	}

	/**
	 * Test the inputs
	 *
	 * @param int    $num      The number
	 * @param string $expected The expected string output for this numberName
	 *
	 * @dataProvider dataProvider
	 *
	 * @return void
	 */
	public function testConvert($num, $expected)
	{
		$this->assertEquals($expected, $this->numberNames->convert($num));
	}
}
