<?php 

class TripRepository
{
	private $databaseHandle;

	public function __construct()
	{
		$dsn = "mysql:dbname=basic_mvc;host=127.0.0.1";
		$dbuser = "root";
		
		$this->databaseHandle = new PDO($dsn, $dbuser);
		$this->databaseHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function find() 
	{
		$sql = "SELECT * FROM basic_mvc.trip";
		foreach($this->databaseHandle->query($sql) as $row){
			$trips[] = new Trip($row["name"], new DateTime($row["start_date"]), new DateTime($row["end_date"]));
		}
		return $trips;
	}

	public function save($trip)
	{
		$name = $trip->getName();
		$startDate = $trip->getStartDate();
		$endDate = $trip->getEndDate();

		$sql = "INSERT INTO basic_mvc.trip (name, start_date, end_date) VALUES ('$name', '$startDate', '$endDate')";
		return $this->databaseHandle->query($sql);
	}

	public function delete($tripId)
	{
		$sql = "DELETE FROM basic_mvc.trip WHERE id = $tripId";
		$this->databaseHandle->query($sql);
	}
}