<?php

namespace Vagabonder\Domain;

use Vagabonder\Domain\Vagabond;

class VagabondTest extends \PHPUnit_Framework_TestCase 
{	
	const VALID_NAME = "Kyoko";
	const VALID_AGE = 25;
	const VALID_GENDER = "Female";
	const VALID_MAIN_LANGUAGE = "English";

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
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER, self::VALID_MAIN_LANGUAGE);
		$this->assertInstanceOf("Vagabonder\Domain\Vagabond", $vagabond, "instanceOf");
		$this->assertEquals(self::VALID_NAME, $vagabond->getName(), "getName");
		$this->assertEquals(self::VALID_AGE, $vagabond->getAge($this->currentDate), "getAge");
		$this->assertEquals(self::VALID_GENDER, $vagabond->getGender(), "getGender");
	}

	/**
	 *@test
	 */
	public function accessLanguages() {
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER, self::VALID_MAIN_LANGUAGE);
		$this->assertTrue(is_array($vagabond->getLanguages()), "not an array");
		$this->assertContains(self::VALID_MAIN_LANGUAGE, $vagabond->getLanguages(), "getLanguages");
		$this->assertEquals(1, count($vagabond->getLanguages()), "Wrong array lenght");
	}

	/**
	 *@test
	 */
	public function doesVagabondSpeak() {
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER, self::VALID_MAIN_LANGUAGE);
		$vagabond->addLanguage("French")->addLanguage("Spanish");
		$this->assertTrue($vagabond->doesSpeak("French"));
		$this->assertFalse($vagabond->doesSpeak("Japanese"));
	}

	/**
	 *@test
	 */
	public function canAddAdditionalLanguages() 
	{
		$vagabond = new Vagabond(self::VALID_NAME, $this->validBirthday, self::VALID_GENDER, self::VALID_MAIN_LANGUAGE);
		$vagabond->addLanguage("French");
		$this->assertContains(self::VALID_MAIN_LANGUAGE, $vagabond->getLanguages(), "getLanguages");
		$this->assertContains("French", $vagabond->getLanguages(), "getLanguages");


	}

	/**
	 *@test
	 */
	public function checkAge()
	{
		$vagabond = new Vagabond("Jason", new \DateTime("06/08/1985"), "Male", self::VALID_MAIN_LANGUAGE);

		$this->assertEquals(28, $vagabond->getAge($this->currentDate), "getAge");
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of DateTime class not found
	 */
	public function handleInvalidAge()
	{
		$vagabond = new Vagabond("Jason", "06/08/1985", "Male", self::VALID_MAIN_LANGUAGE);
	}

	/**
	 *@test
	 *@expectedException \InvalidArgumentException
	 *@expectedExceptionMessage Instance of Vagabond class not found
	 */
	public function handleInvalidCanSpeakWithArgument()
	{	
		//precondition
		$thisFool = new Vagabond("This fool", new \DateTime("06/08/1985"), "Male", self::VALID_MAIN_LANGUAGE);
		//action
		$thisFool->canSpeakWith("Kyoko");
	}

	/**
	 *@test
	 */
	public function validCanSpeakWith()
	{
		//precondition
		$jason = new Vagabond("Jason", new \DateTime("06/08/1985"), "Male", self::VALID_MAIN_LANGUAGE);
		$kyoko = new Vagabond("Jason", new \DateTime("05/10/1988"), "Female", self::VALID_MAIN_LANGUAGE);

		//action
		$result = $jason->canSpeakWith($kyoko);

		//assertion
		$this->assertTrue($result);
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
