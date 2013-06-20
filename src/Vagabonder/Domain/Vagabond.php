<?php

namespace Vagabonder\Domain;

class Vagabond
{
	private $name = null;
	private $birthday = null;
	private $gender = null;

	public function __construct($name, $birthday, $gender)
	{
		
		if(! $birthday instanceof \DateTime) {
			throw new \InvalidArgumentException("Instance of DateTime class not found");
		}

		$this->name = $name;
		$this->birthday = $birthday;
		$this->gender = $gender;

	}

	public function getName() 
	{
		return $this->name;
	}

	public function getAge($currentDate)
	{
		$interval = $currentDate->diff($this->birthday);
		return $interval->y;
	}

	public function getGender()
	{
		return $this->gender;
	}
}