<?php
namespace App\core;

use PDO;
use PDOException;
class Model
{
	protected $conn = null;
	private $host = HOST;
	private $dbname = DBNAME;
	private $user = USER;
	private $password = PASSWORD;

	public function __construct()
	{
		$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

		try {
			$this->conn = new PDO($dsn, $this->user, $this->password);
		} catch (PDOException $e) {
			$this->conn = null;
			var_dump($e->getMessage());
			die();
		}
	}

	public function get_data()
	{
	}
}
