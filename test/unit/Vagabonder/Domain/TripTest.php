<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Trip;
use Vagabonder\Domain\Location;

class TripTest extends \PHPUnit_Framework_TestCase
{
	const VALID_TRIP_NAME = "Jamaica 2013";
	const VALID_START_DATE = null;
	const VALID_END_DATE = null;

	protected function setup() 
	{
		$this->validStartDate = new \DateTime("06/24/2013");
		$this->validEndDate = new \DateTime("07/14/2013");
		$this->validLocation = new Location("Kingston", "Jamaica");
	}

	/**
	 *@test
	 */
	public function initializeTripWithValidData() 
	{
		$trip = new Trip(self::VALID_TRIP_NAME, $this->validLocation, $this->validStartDate, $this->validEndDate);
		$location = $this->validLocation;

		$this->assertInstanceOf("Vagabonder\Domain\Trip", $trip, "instanceOf");
		$this->assertInstanceOf("Vagabonder\Domain\Location", $location, "instanceOf");
		$this->assertEquals(self::VALID_TRIP_NAME, $trip->getTripName(), "getTripName");
		$this->assertEquals("Kingston", $location->getCity(), "getCity");
		$this->assertEquals("Jamaica", $location->getCountry(), "getCountry");
		$this->assertEquals($this->validStartDate, $trip->getStartDate(), "getStartDate");
		$this->assertEquals($this->validEndDate, $trip->getEndDate(), "getEndDate");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of DateTime class not found
	 */
	public function handleInvalidStartDateArgument()
	{
		$trip = new Trip(self::VALID_TRIP_NAME, $this->validLocation, "06/24/2013", $this->validEndDate);
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of DateTime class not found
	 */
	public function handleInvalidEndDateArgument()
	{
		$trip = new Trip(self::VALID_TRIP_NAME, $this->validLocation, $this->validStartDate, "07/14/2013");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of Location class not found
	 */
	public function handleInvalidLocationArgument()
	{
		$trip = new Trip(self::VALID_TRIP_NAME, "Kingston, Jamaice", $this->validStartDate, $this->validEndDate);
	}

	/**
	 *@test
	 */
	public function setValidBudget() {
		$trip = new Trip(self::VALID_TRIP_NAME, $this->validLocation, $this->validStartDate, $this->validEndDate);

		$result = $trip->setBudget(600);

		$this->assertEquals(600, $trip->getBudget(), "setBudget");
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

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of DateTime class not found
	 */
}