<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Vagabond\Language;

class Vagabond
{
	private $name = null;
	private $birthday = null;
	private $gender = null;
	private $languages = array();

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

	public function getLanguages() 
	{
		return $this->languages;
	}

	public function addLanguage($language) 
	{
		$this->languages[] = $language;
		return $this;
	}

	public function doesSpeak($languageName) 
	{
		foreach ($this->languages as $language) {
			if($language->getLanguageName() == $languageName)
				return true;
		}
		return false;
	}

	public function canSpeakWith($otherVagabond)
	{
		$commonLanguages = array();
		$commonLanguagesProficiency = array();

		if(! $otherVagabond instanceof Vagabond) {
			throw new \InvalidArgumentException("Instance of Vagabond class not found");
		}

		foreach ($this->languages as $language) {
			foreach ($otherVagabond->getLanguages() as $otherVagabondLanguage) {
				if($language->getLanguageName() == $otherVagabondLanguage->getLanguageName()) {
					$commonLanguages[] = $language->getLanguageName();
					$commonLanguagesProficiency[] = $language->getLanguageProficiency() + $otherVagabondLanguage->getLanguageProficiency();
				}
			}
		}

		if(count($commonLanguages) > 0) {
			return $commonLanguages[array_search(max($commonLanguagesProficiency), $commonLanguagesProficiency)];
		}
		
		return false;
	}
}
