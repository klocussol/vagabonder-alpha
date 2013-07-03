<?php

class Vagabond 
{
	private $name = null;
	private $gender = null;
	private $birthday = null;

	public function __construct($name, $gender, $birthday)
	{
		if(! $birthday instanceof \DateTime) {
			throw new \InvalidArgumentException("Instance of DateTime class not found");
		}

		$this->name = $name;
		$this->gender = $gender;
		$this->birthday = $birthday;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function getAge($currentDate)
	{
		$interval = $currentDate->diff($this->birthday);
		return $interval->y;
	}
}