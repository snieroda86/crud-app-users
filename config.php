<?php 
class Config{
	private const DBHOST = 'localhost';
	private const DBUSER = 'root';
	private const DBPASS = '';
	private const DBNAME = 'crud-app-users';

	// Database source network
	private $dsn = 'mysql:host='.self::DBHOST.';dbname='.self::DBNAME.'';
	protected $conn = null;

	// Connect to database
	public function __construct(){
		try {
		  $this->conn = new PDO( $this->dsn , self::DBUSER , self::DBPASS);
		  // set the PDO error mode to exception
		  $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}
	}

}
