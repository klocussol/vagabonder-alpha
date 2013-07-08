Feature: Delete an upcoming trip
	In order to remove a trip that I am no longer taking
	As a user
	I want to delete a trip

	Scenario:
		Given I am on "/?page=upcoming-trips"
		When I press "delete" next to "Croatia"
		Then I should not see "Croatia"