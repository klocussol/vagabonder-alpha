<?php 

class TripRepository
{

	private $databaseHandle;

	public function __construct()
	{
		$dsn = "mysql:dbname=basic_mvc;host=127.0.0.1";
		$dbuser = "root";
		
		$this->databaseHandle = new PDO($dsn, $dbuser);
	}

	public function find() 
	{
		$sql = "SELECT * FROM basic_mvc.trip";
		foreach($this->databaseHandle->query($sql) as $row){
			$trips[] = new Trip($row["name"], new DateTime($row["start_date"]), new DateTime($row["end_date"]));
		}
		return $trips;
	}
}