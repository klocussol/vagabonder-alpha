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
}
