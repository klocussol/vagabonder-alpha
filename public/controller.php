<?php

require "model.php";
require "TripRepository.php";

function getAllTrips() 
{
	$tripRepository = new TripRepository();
	return $tripRepository->find();
}

if(empty($_POST)) {
	if(isset($_GET["page"])) {
		switch($_GET["page"]) {
			case "upcoming-trips":
				$trips = getAllTrips();
				include "view-trips.php";
				break;
			case "bonds":
				include "view-bonds.php";
				break;
		}
	} else {
		include "view-form.php";
	}
} else {

	$test = $_POST["destination"];

	$trip = new Trip($test, $_POST["start-date"], $_POST["end-date"]);

	$name = $trip->getName();
	$timeUntilHumanReadble = $trip->getTimeUntilHumanReadable();


	include "view-result.php";
}