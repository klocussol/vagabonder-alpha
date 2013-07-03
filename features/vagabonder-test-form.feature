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

	Scenario: I will know in how many days my trip is
		Given I am on the homepage
		When I fill in "destination" with "Croatia"
		And I fill in "start-date" with the date "4" days from today
		And I fill in "end-date" with the date "10" days from today
		And I press "submit"
		Then I should see "You're traveling to Croatia in 4 days, have fun!"
		And I should not see "Destination"
		And I should not see "Leaving"
		And I should not see "Returning"

	Scenario: I will know that my trip starts tomorrow
		Given I am on the homepage
		When I fill in "destination" with "Croatia"
		And I fill in "start-date" with the date "1" day from today
		And I fill in "end-date" with the date "10" days from today
		And I press "submit"
		Then I should see "You're traveling to Croatia tomorrow, have fun!"
		And I should not see "Destination"
		And I should not see "Leaving"
		And I should not see "Returning"	