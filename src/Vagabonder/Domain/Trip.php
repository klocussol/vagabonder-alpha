<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Trip\Itinerary;
use Vagabonder\Domain\Trip\Itinerary\ItineraryItem;

class Trip 
{
	private $name = null;
	private $budget = null;
	private $itinerary = null;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function getTripName()
	{
		return $this->name;
	}

	public function setItinerary($itinerary)
	{
		$this->itinerary = $itinerary;
	}
	
	public function getItinerary()
	{
		return $this->itinerary;
	}

	public function setBudget($budget) 
	{
		$this->budget = $budget;
	}

	public function getBudget()
	{
		return $this->budget;
	}

	public function getTripDuration()
	{
		$itinerary = $this->getItinerary();
		$itineraryItems = $itinerary->getItineraryDetails();

		$firstItinerayItem = $itineraryItems[0];
		$lastItinerayItem = $itineraryItems[count($itineraryItems) - 1];

		$startDate = $firstItinerayItem->getStartDate();
		$endDate = $lastItinerayItem->getEndDate();

		$duration = $endDate->diff($startDate);

		return $duration->d + 1;
	}
}