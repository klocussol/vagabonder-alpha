Feature: my first feature
	In order to prepare for my trip
	As a user
	I want a page enter in my trip detail in a form

	Scenario: I will know I am on the homepage
		Given I am on homepage
		Then I should see "Wanna Vagabond?"
		And I should see "Destination"
		And I should see "Leaving"
		And I should see "Returning"

	Scenario: Set travel location and dates
		Given I am on the homepage
		When I fill in "destination" with "Croatia"
		And I fill in "start-date" with "2013-07-04"
		And I fill in "end-date" with "2013-07-14"
		And I press "submit"
		Then I should see "You're traveling to Croatia in 10 days, have fun!"
		And I should not see "Destination"
		And I should not see "Leaving"
		And I should not see "Returning"