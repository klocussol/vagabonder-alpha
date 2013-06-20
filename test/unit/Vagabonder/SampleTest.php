<?php

namespace Vagabonder;

use Vagabonder\Sample;

class SampleTest extends \PHPUnit_Framework_TestCase 
{	
	/** 
	 * @test
	 */
	public function shouldReturnOk()
	{
		$sample = new Sample();
		$result = $sample->getOk();
		$this->assertEquals("OK", $result, "Not ok");
	}
}
