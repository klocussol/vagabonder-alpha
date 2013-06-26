<?php 

namespace Vagabonder\Domain\Trip\Itinerary;

use Vagabonder\Domain\Location;

class ItineraryItem 
{
	private $startDate = null;
	private $endDate = null;
	private $location;
	private $activityList = array();
	private $base = null;

	public function __construct($startDate, $endDate, $location)
	{
		if((! $startDate instanceof \DateTime) || (! $endDate instanceOf \DateTime)) {
			throw new \InvalidArgumentException("Instance of DateTime class not found");
		}

		if(! $location instanceOf Location) {
			throw new \InvalidArgumentException("Instance of Location class not found");
		}

		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->location = $location;

		$this->activityList[] = "Sting Festival";
	}

	public function getStartDate()
	{
		return $this->startDate;
	}

	public function getEndDate()
	{
		return $this->endDate;
	}

	public function setBase($base)
	{
		$this->base = $base;
	}

	public function getBase() {
		return $this->base;
	}

	public function getActivityList()
	{
		return $this->activityList;
	}

	public function addActivity($activity)
	{
		$this->activityList[] = $activity;
		return $this;
	}
}