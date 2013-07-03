Feature: View all bonds
	In order to see all the bonds I have formed
	As a user
	I want a page to display all of the bonds I have formed

	Scenario: I can navigate to the bonds page
		Given I am on homepage
		When I follow "Bonds"
		Then I should see "All bonds"