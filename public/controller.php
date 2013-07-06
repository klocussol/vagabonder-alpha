<?php
require "model.php";
require "model-user.php";
require "TripRepository.php";
require "VagabondRepository.php";
?>

<head>
	<title>Vagabonder</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/styles.css" />
</head>

<?php
function renderNav()
{
	include "partial-nav.php";
}

function getAllTrips() 
{
	$tripRepository = new TripRepository();
	return $tripRepository->find();
}

function getAllVagabonds()
{
	$vagabondRepository = new VagabondRepository();
	return $vagabondRepository->find();
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
			case "all-users":
				$vagabonds = getAllVagabonds();
				include "view-vagabonds.php";
				break;
			case "new-trip":
				include "view-form.php";
				break;
			case "my-profile":
				include "view-profile.php";
				break;
		}
	} else {
		include "view-home.php";
	}
} else {

	$trip = new Trip($_POST["destination"], $_POST["start-date"], $_POST["end-date"]);
	$tripRepository = new TripRepository();

	$saveResult = $tripRepository->save($trip);

	if($saveResult) {
		$trips = getAllTrips();
		include "view-trips.php";
	}

}