<?php

class UserRepository
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
		$sql = "SELECT * FROM basic_mvc.user";
		foreach($this->databaseHandle->query($sql) as $row) {
			$users[] = new Vagabond($row["name"], $row["gender"], new DateTime($row["birthday"]));
		}
		return $users;
	}
}