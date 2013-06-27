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
}