<?php

namespace Vagabonder\Domain\Trip;

use Vagabonder\Domain\Trip\Itinerary\ItineraryItem; 

class Itinerary
{
	private $startDate = null;
	private $endDate = null;
	private $itineraryDetails = array();

	public function __construct($itineraryItem)
	{
		$this->addItineraryItem($itineraryItem);
	}

	public function getItineraryDetails()
	{
		return $this->itineraryDetails;
	}

	public function addItineraryItem($itineraryItem)
	{
		if(! $itineraryItem instanceof ItineraryItem) {
			throw new \InvalidArgumentException("Instance of ItineraryItem class not found");
		}

		$this->itineraryDetails[] = $itineraryItem;
		
		
		return $this;
	}

	public function sortItineraryItems()
	{
		$itineraryList = $this->itineraryDetails;
		$orderedList = array();
		$startDates = array();

		foreach ($itineraryList as $itineraryItem) {
			$startDates[] = $itineraryItem->getStartDate();
		}

		foreach ($itineraryList as $itineraryItem) {
			$endDates[] = $itineraryItem->getEndDate();
		}

		while(count($itineraryList) > 0) {
			$orderedList[] = $itineraryList[array_search(min($startDates), $startDates)];
			
			array_splice($itineraryList, array_search(min($startDates), $startDates), 1);
			array_splice($startDates, array_search(min($startDates), $startDates),1);
		}

		$this->itineraryDetails = $orderedList;
	}


}