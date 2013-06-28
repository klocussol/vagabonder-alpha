<?php

class Trip
{
	private $name = null;
	private $startDate = null;
	private $endDate = null;
	
	public function __construct($name, $startDate, $endDate)
	{
		$this->name = $name;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getStartDate()
	{
		return $this->startDate;
	}

	public function getEndDate()
	{
		return $this->endDate;
	}

	public function getTimeUntilHumanReadable()
	{
		$startDate = new DateTime($this->startDate);
		$currentDate = new DateTime();
		$difference = $startDate->diff($currentDate);

		var_dump($difference);

		if($difference == 0) {
			return "now";
		} else if($difference == 1) {
			return $difference . " day";
		} else {
			return $difference . " days";
		}
	}
}