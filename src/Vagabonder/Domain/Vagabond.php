<?php

namespace Vagabonder\Domain;

class Vagabond
{
	private $name = null;
	private $birthday = null;
	private $gender = null;
	private $languages = array();

	public function __construct($name, $birthday, $gender, $mainLanguage)
	{
		
		if(! $birthday instanceof \DateTime) {
			throw new \InvalidArgumentException("Instance of DateTime class not found");
		}

		$this->name = $name;
		$this->birthday = $birthday;
		$this->gender = $gender;
		$this->addLanguage($mainLanguage);

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

	public function getLanguages() 
	{
		return $this->languages;
	}

	public function addLanguage($newLanguage) 
	{
		$this->languages[] = $newLanguage;
		return $this;
	}

	public function doesSpeak($language) 
	{
		return in_array($language, $this->languages);
	}

	public function canSpeakWith($otherVagabond)
	{
		if(! $otherVagabond instanceof Vagabond) {
			throw new \InvalidArgumentException("Instance of Vagabond class not found");
		}

		return count(array_intersect($otherVagabond->getLanguages(), $this->getLanguages())) > 0;
	}

}