<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Vagabond;
use Vagabonder\Domain\Vagabond\Language;

class VagabondTest extends \PHPUnit_Framework_TestCase 
{	
	const VALID_NAME = "Kyoko";
	const VALID_AGE = 25;
	const VALID_GENDER = "Female";

	private $validBirhday = null; 
	private $currentDate = null; 

	protected function setup() 
	{
		$this->validBirthday = new \DateTime("05/10/1988");
		$this->currentDate = new \DateTime("06/20/2013");
	}
	/**
	 *@test
	 */
	public function initializeWithValidData() 
	{
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER);
		$this->assertInstanceOf("Vagabonder\Domain\Vagabond", $vagabond, "instanceOf");
		$this->assertEquals(self::VALID_NAME, $vagabond->getName(), "getName");
		$this->assertEquals(self::VALID_AGE, $vagabond->getAge($this->currentDate), "getAge");
		$this->assertEquals(self::VALID_GENDER, $vagabond->getGender(), "getGender");
	}

	/**
	 *@test
	 */
	public function checkAge()
	{
		$vagabond = new Vagabond("Jason", new \DateTime("06/08/1985"), "Male");

		$this->assertEquals(28, $vagabond->getAge($this->currentDate), "getAge");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of DateTime class not found
	 */
	public function handleInvalidAge()
	{
		$vagabond = new Vagabond("Jason", "06/08/1985", "Male");
	}

	/**
	 *@test
	 */
	public function accessLanguages() {
		//precondition
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER);
		$english = new Language("English", 10);
		$french = new Language("French", 8);
		
		//action
		$vagabond->addLanguage($english)->addLanguage($french);
		$languageList = $vagabond->getLanguages();
		$result = $languageList[0];

		//assertion
		$this->assertTrue(is_array($languageList), "not an array");
		$this->assertInstanceOf("Vagabonder\Domain\Vagabond\Language", $result, "instanceOf");
		$this->assertEquals(2, count($languageList), "Wrong array lenght");
	}

	/**
	 *@test
	 */
	public function doesVagabondSpeak() {
		//precondition
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER);
		$english = new Language("English", 10);
		$french = new Language("French", 8);
		
		//action
		$vagabond->addLanguage($french)->addLanguage($english);
		
		//assertion
		$this->assertTrue($vagabond->doesSpeak("French"));
		$this->assertFalse($vagabond->doesSpeak("Japanese"));
	}

	/**
	 *@test
	 */
	public function canAddAdditionalLanguages() 
	{
		//precondition
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER);
		$english = new Language("English", 10);
		$french = new Language("French", 8);

		//action
		$vagabond->addLanguage($english)->addLanguage($french);
		$languageList = $vagabond->getLanguages();
		
		//assertion
		$this->assertEquals("English", $languageList[0]->getLanguageName(), "Not english");
		$this->assertEquals(10, $languageList[0]->getLanguageProficiency(), "Not the correct proficiency");
		$this->assertEquals("French", $languageList[1]->getLanguageName(), "Not french");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of Vagabond class not found
	 */
	public function handleInvalidCanSpeakWithArgument()
	{	
		//precondition
		$thisFool = new Vagabond("This fool", new \DateTime("06/08/1985"), "Male");
		//action
		$thisFool->canSpeakWith("Kyoko");
	}

	/**
	 *@test
	 */
	public function validCanSpeakWith()
	{
		//precondition
		$jason = new Vagabond("Jason", new \DateTime("06/08/1985"), "Male");
		$kyoko = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER);
		$chris = new Vagabond("Chris", $this->validBirthday, "Male");
		

		$kyoko->addLanguage($this->getLanguage("Spanish", 4))
		      ->addLanguage($this->getLanguage("English", 9))
			  ->addLanguage($this->getLanguage("French", 7));
		$jason->addLanguage($this->getLanguage("Italian", 8))
			  ->addLanguage($this->getLanguage("French", 6));
		$chris->addLanguage($this->getLanguage("Arabic", 6))
			  ->addLanguage($this->getLanguage("Japanese", 5));

		//action
		$result = $jason->canSpeakWith($kyoko);
		$result2 = $chris->canSpeakWith($kyoko);

		//assertion
		$this->assertEquals("French", $result, "canSpeakWith");
		$this->assertFalse($result2, "Shouldn't be able to speak to each other");
	}

	private function getLanguage($languageName, $languageProficiency) 
	{
		return new Language($languageName, $languageProficiency);
	}

	/**
	 *@test
	 */
	//public function genericTest()
	//{
		//precondition

		//action

		//assertion
	//}

}
