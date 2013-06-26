<?php

namespace Vagabonder\Domain;

class Trip 
{
	private $name = null;
	private $startDate = null;
	private $endDate = null;
	private $location;
	private $budget = null;

	public function __construct($name, $location, $startDate, $endDate)
	{
		if((! $startDate instanceof \DateTime) || ! $endDate instanceof \DateTime) {
			throw new \InvalidArgumentException("Instance of DateTime class not found");
		}

		if(! $location instanceOf Location) {
			throw new \InvalidArgumentException("Instance of Location class not found");
		}

		$this->name = $name;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->location = $location;
	}

	public function getTripName()
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

	public function setBudget($budget) 
	{
		$this->budget = $budget;
	}

	public function getBudget()
	{
		return $this->budget;
	} 
}