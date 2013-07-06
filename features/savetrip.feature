Feature: Save a specific trip's information
	In order to plan for my trip
	As a user
	I want to store my trip information on a page

	Scenario: I can navigate to the trip form
		Given I am on homepage
		When I follow "New"
		Then I should see "Destination"
		And I should see "Leaving"
		And I should see "Returning"

	Scenario: I can save a new trip
		Given I am on "/?page=new-trip"
		And I fill in "destination" with "Japan"
		And I fill in "start-date" with the date "10" days from today
		And I fill in "end-date" with the date "30" days from today
		When I press "submit"
		Then I should see "upcoming trips"
		And I should see "Japan"