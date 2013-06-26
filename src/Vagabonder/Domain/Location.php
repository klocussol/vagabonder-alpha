<?php

namespace Vagabonder\Domain;

class Location {

	private $city = null;
	private $country = null;

	public function __construct($city, $country)
	{
		$this->city = $city;
		$this->country = $country;
	}

	public function getCity() 
	{
		return $this->city;
	}

	public function getCountry()
	{
		return $this->country;
	}
}