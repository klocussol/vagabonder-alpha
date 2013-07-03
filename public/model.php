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
		$startDate = new DateTime($this->startDate, new DateTimeZone('AMERICA/New_York'));
		$currentDate = new DateTime("now", new DateTimeZone('AMERICA/New_York'));
		$difference = $startDate->diff($currentDate)->d;

		$startDay = $startDate->format("d");
		$currentDay = $currentDate->format("d");

		if($difference == 0 && ($startDate->format("d") == $currentDate->format("d"))) {
			return "today";
		} else if(($difference == 0 && ($startDate->format("d") != $currentDate->format("d"))) || ($difference == 1)) {
			return "tomorrow";
		} else {
			return "in " . ++$difference . " days";
		}
	}
}