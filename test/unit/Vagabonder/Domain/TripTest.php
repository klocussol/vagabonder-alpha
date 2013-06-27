<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Trip;
use Vagabonder\Domain\Location;
use Vagabonder\Domain\Trip\Itinerary;
use Vagabonder\Domain\Trip\Itinerary\ItineraryItem;

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
		$trip = new Trip(self::VALID_TRIP_NAME);

		$this->assertInstanceOf("Vagabonder\Domain\Trip", $trip, "instanceOf");
		$this->assertEquals(self::VALID_TRIP_NAME, $trip->getTripName(), "getTripName");
	}

	/**
	 *@test
	 */
	public function setValidItinerary()
	{
		$trip = new Trip(self::VALID_TRIP_NAME);
		$itinerary = $this->getValidItinerary();

		$trip->setItinerary($itinerary);

		$this->assertEquals($itinerary, $trip->getItinerary(), "setAndGetItinerary");
	}

	/**
	 *@test
	 */
	public function setValidBudget() {
		$trip = new Trip(self::VALID_TRIP_NAME);

		$result = $trip->setBudget(600);

		$this->assertEquals(600, $trip->getBudget(), "setBudget");
	}

	private function getValidItinerary()
	{
		$location = new Location("Kingston", "Jamaica");
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $location);
		
		return new Itinerary($itineraryItem);

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