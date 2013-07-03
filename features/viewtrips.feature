Feature: View all upcoming trips
	In order to organize all my trips
	As a user
	I want a page to display all of my upcoming trips

	Scenario: I can navigate to the trips page
		Given I am on homepage
		When I follow "Upcoming Trips"
		Then I should see "All upcoming trips"

	Scenario: I can see all of my upcoming trips
		Given I am on "/?page=upcoming-trips"
		Then I should see "Croatia"
		And I should see "Bali" 