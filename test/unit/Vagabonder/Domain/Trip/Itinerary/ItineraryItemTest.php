<?php

namespace Vagabonder\Domain\Trip\Itinerary;

use Vagabonder\Domain\Trip\Itinerary\ItineraryItem;
use Vagabonder\Domain\Location;

class ItineraryItemTest extends \PHPUnit_Framework_TestCase
{
	const VALID_BASE = "Reggae Hostel";

	private $activities = array();

	protected function setup() 
	{
		$this->validStartDate = new \DateTime("06/24/2013");
		$this->validEndDate = new \DateTime("07/14/2013");
		$this->validLocation = new Location("Kingston", "Jamaica");
	}

	/**
	 *@test
	 */
	public function initializeItineraryItemWithValidData()
	{
		//precondition
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $this->validLocation);

		//assertion
		$this->assertInstanceOf("Vagabonder\Domain\Trip\Itinerary\ItineraryItem", $itineraryItem, "instanceOf");
		$this->assertInstanceOf("Vagabonder\Domain\Location", $this->validLocation, "instanceOf");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of DateTime class not found
	 */
	public function handleInvalidStartDateArgument()
	{
		$itineraryItem = new ItineraryItem("06/24/2013", $this->validEndDate, $this->validLocation);
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of DateTime class not found
	 */
	public function handleInvalidEndDateArgument()
	{
		$itineraryItem = new ItineraryItem($this->validStartDate, "07/14/2013", $this->validLocation);
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of Location class not found
	 */
	public function handleInvalidLocationArgument()
	{
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, "Kingston, Jamaica");
	}

	/**
	 *@test
	 */
	public function testGetItineraryItemStartDate()
	{
		//precondition
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $this->validLocation);

		//action
		$result = $itineraryItem->getStartDate();

		//assertion
		$this->assertEquals($this->validStartDate, $result, "getStartDate");
	}	

	/**
	 *@test
	 */
	public function testGetItineraryItemEndDate()
	{
		//precondition
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $this->validLocation);

		//action
		$result = $itineraryItem->getEndDate();

		//assertion
		$this->assertEquals($this->validEndDate, $result, "getStartDate");
	}

	/**
	 *@test
	 */
	public function testSetAndGetBase() 
	{
		//precondition
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $this->validLocation);

		//action
		$result = $itineraryItem->setBase("Reggae Hostel");
		$result = $itineraryItem->getBase();

		//assertions
		$this->assertEquals(self::VALID_BASE, $result, "setBase");

	}

	/**
	 *@test
	 */
	public function testGetActivityList()
	{
		//precondition
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $this->validLocation);

		//action
		$activityList = $itineraryItem->getActivityList();

		//assertion
		$this->assertTrue(is_array($activityList), "not an array");
		$this->assertEquals("Sting Festival", $activityList[0], "getActivityList");
	}	

	/**
	 *@test
	 */
	public function testAddActivityList()
	{
		//precondition
		$itineraryItem = new ItineraryItem($this->validStartDate, $this->validEndDate, $this->validLocation);

		//action
		$itineraryItem->addActivity("Trench Town Tour")->addActivity("Bob Marley Museum");
		$result = $itineraryItem->getActivityList();

		//assertion
		$this->assertEquals("Trench Town Tour", $result[1], "addActivity");
		$this->assertEquals("Bob Marley Museum", $result[2], "addActivity");
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