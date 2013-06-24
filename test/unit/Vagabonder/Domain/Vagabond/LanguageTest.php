<?php

namespace Vagabonder\Domain\Vagabond;

use Vagabonder\Domain\Vagabond\Language;

class LanguageTest extends \PHPUnit_Framework_TestCase 
{
	/**
	 *@test
	 */
	public function initializeLanguages()
	{
		//precondition
		$language = new Language("French", 8);
		
		//assertion
		$this->assertInstanceOf("Vagabonder\Domain\Vagabond\Language", $language, "instanceOf");
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
}