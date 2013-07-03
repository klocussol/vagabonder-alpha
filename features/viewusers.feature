Feature: View all users' basic info
	In order to see all the users in the system
	As a user
	I can access a page that displays all the users' information

	Scenario: I can navigate to my profile
		Given I am on homepage
		When I follow "Check out"
		And I follow "Both"
		Then I should see "All users"