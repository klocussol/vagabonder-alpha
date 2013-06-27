Feature: my first feature
	In order to prepare for my trip
	As a user
	I want a page enter in my trip detail in a form

	Scenario: I will know I'm awesome
		Given I am on homepage
		Then I should see "Wanna Vagabond?"
		And I should see "Destination"
		And I should see "Leaving"
		And I should see "Returning"

	Scenario: Set travel location and dates
		Given I am on the homepage
		When I fill in "destination" with "Croatia"
		And I fill in "start-date" with "2013-09-12"
		And I fill in "end-date" with "2013-09-24"
		And I press "submit"
		Then I should see "You're traveling to Croatia from 2013-09-12 to 2013-09-24, have fun!"
		And I should not see "Destination"
		And I should not see "Leaving"
		And I should not see "Returning"