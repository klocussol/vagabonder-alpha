<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Vagabond;

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
		
		//action
		$vagabond->addLanguage("English", 10)->addLanguage("French", 8);
		$languageList = $vagabond->getLanguages();
		$result = $languageList[0];

		//assertion
		$this->assertTrue(is_array($languageList), "not an array");
		$this->assertInstanceOf("Vagabonder\Domain\Language", $result, "instanceOf");
		$this->assertEquals(2, count($languageList), "Wrong array lenght");
	}

	/**
	 *@test
	 */
	public function doesVagabondSpeak() {
		//precondition
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER);
		
		//action
		$vagabond->addLanguage("French", 8)->addLanguage("Spanish", 6);
		
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
		
		//action
		$vagabond->addLanguage("English", 10)->addLanguage("French", 8);
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
		$kyoko->addLanguage("English", 8)->addLanguage("Spanish", 5)->addLanguage("French", 6);
		$jason->addLanguage("English", 2)->addLanguage("Italian", 4)->addLanguage("French", 10);
		$chris->addLanguage("Arabic", 5)->addLanguage("Japanese", 8);

		//action
		$result = $jason->canSpeakWith($kyoko);
		$result2 = $chris->canSpeakWith($kyoko);

		//assertion
		$this->assertEquals("French", $result, "canSpeakWith");
		$this->assertFalse($result2, "Shouldn't be able to speak to each other");
	}

	/**
	 *@test
	 */
	public function initializeLanguages()
	{
		//precondition
		$language = new Language("French", 8);
		
		//assertion
		$this->assertInstanceOf("Vagabonder\Domain\Language", $language, "instanceOf");
		$this->assertEquals("French", $language->getLanguageName(), "getLanguageName");
		$this->assertEquals(8, $language->getLanguageProficiency(), "getLanguageProficiency");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Rate your proficiency on a scale from 1 to 10
	 */
	public function handleInvalidLanguageProficiency()
	{
		$languages = new Language("Japanese", 40);
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
