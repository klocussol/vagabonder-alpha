<?php

namespace Vagabonder\Domain\Vagabond;

class Language 
{
	private $name = null;
	private $proficiency = null;

	public function __construct($name, $proficiency)
	{
		if($proficiency < 1 || $proficiency > 10) {
			throw new \InvalidArgumentException("Rate your proficiency on a scale from 1 to 10");
		}

		$this->name = $name;
		$this->proficiency = $proficiency;
	}

	public function getLanguageName() 
	{
		return $this->name;
	}

	public function getLanguageProficiency()
	{
		return $this->proficiency;
	}
}