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

	/**
	 *@test
	 */
	public function testGetTripDuration()
	{
		//precondition
		$trip = new Trip(self::VALID_TRIP_NAME);
		$location = new Location("Kingston", "Jamaica");
		$itineraryItem = new ItineraryItem(new \DateTime("09/12/2013"), new \DateTime("09/15/2013"), $location);
		$itinerary = new Itinerary($itineraryItem);
		$itineraryItem1 = new ItineraryItem($this->getDateTime("09/19/2013"), $this->getDateTime("09/23/2013"), $this->getLocation("Long Bay", "Jamaica"));
		$itineraryItem2 = new ItineraryItem($this->getDateTime("09/16/2013"), $this->getDateTime("09/18/2013"), $this->getLocation("Blue Mountains", "Jamaica"));
		$result = $itinerary->addItineraryItem($itineraryItem1)->addItineraryItem($itineraryItem2);
		$itinerary->sortItineraryItems();
		$trip->setItinerary($itinerary);

		//action
		$duration = $trip->getTripDuration();

		//assertion
		$this->assertEquals(12, $duration, "getTripDuration");
	}

	//Helper Methods
	private function getValidItinerary()
	{
		$location = new Location("Kingston", "Jamaica");
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $location);
		
		return new Itinerary($itineraryItem);
	}

	private function getDateTime($date)
	{
		return new \DateTime($date);
	}

	private function getLocation($city, $country)
	{
		return new Location($city, $country);
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