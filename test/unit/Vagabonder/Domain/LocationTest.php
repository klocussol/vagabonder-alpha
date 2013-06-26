<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Location;

class LocationTest extends \PHPUnit_Framework_TestCase
{
	const VALID_CITY = "Washington";
	const VALID_COUNTRY = "United States";

	/**
	 *@test
	 */
	public function initializeLocationWithValidData() 
	{
		//precondition
		$location = new Location(self::VALID_CITY, self::VALID_COUNTRY);

		//assertion
		$this->assertInstanceOf("Vagabonder\Domain\Location", $location, "instanceOf");
		$this->assertEquals("Washington", $location->getCity(), "getCity");
		$this->assertEquals("United States", $location->getCountry(), "getCountry");
	}

	/**
	 *@test
	 */
	//public function genericTest()
	//{
		//precondition

		//action

		//assertion
	//}
}