<?php

namespace Vagabonder\Domain\Trip;

use Vagabonder\Domain\Trip\Itinerary;
use Vagabonder\Domain\Trip\Itinerary\ItineraryItem;
use Vagabonder\Domain\Location;

class ItineraryTest extends \PHPUnit_Framework_TestCase 
{
	
	private $itineraryDetails = array();

	public function setup()
	{
		$this->validStartDate = new \DateTime("09/12/2013");
		$this->validEndDate = new \DateTime("09/29/2013");
	}

	/**
	 *@test
	 */
	public function initializeWithValidData()
	{
		//precondition
		$itinerary = $this->getValidItinerary();
		//assertion
		$this->assertInstanceOf("Vagabonder\Domain\Trip\Itinerary", $itinerary, "instanceOf");
	}

	/**
	 *@test
	 */
	public function testGetItineraryDetails()
	{
		//precondition
		$itinerary = $this->getValidItinerary();

		//action
		$result = $itinerary->getItineraryDetails();

		//assertion
		$this->assertTrue(is_array($result), "Not an array");
	}

	/**
	 *@test
	 */
	public function testAddItineraryDetails()
	{
		//precondition
		$itinerary = $this->getValidItinerary();
		$itineraryItem1 = new ItineraryItem($this->getDateTime("09/12/2013"), $this->getDateTime("09/16/2013"), $this->getLocation("Kingston", "Jamaica"));

		//action
		$result = $itinerary->addItineraryItem($itineraryItem1);
		$list = $itinerary->getItineraryDetails();
		
		//assertion
		$this->assertInstanceOf("Vagabonder\Domain\Trip\Itinerary", $result, "instanceOf");
		$this->assertInstanceOf("Vagabonder\Domain\Trip\Itinerary\ItineraryItem", $itineraryItem1, "instanceOf");
		$this->assertEquals(2, count($list), "Wrong array lenght");
		$this->assertEquals($itineraryItem1, $list[1], "Wrong ItineraryItem");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of ItineraryItem class not found
	 */
	public function handleAddInvalidItineraryItemArgument()
	{
		$itinerary = $this->getValidItinerary();
		$result = $itinerary->addItineraryItem("Some details about my trip");
	}

	
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