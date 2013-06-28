<?php

require "model.php";

if(empty($_POST)) {
	include "view-form.php";
} else {

	$test = $_POST["destination"];

	$trip = new Trip($test, $_POST["start-date"], $_POST["end-date"]);

	$name = $trip->getName();
	$timeUntilHumanReadble = $trip->getTimeUntilHumanReadable();


	include "view-result.php";
}