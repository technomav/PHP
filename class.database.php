<?php
// mysql - mysqli connection
class Database {
	private $_connection;
	private static $_instance;
	private $_host = "dbHost";
	private $_username = "dbUser";
	private $_password = "dbPass";
    private $_database = "dbName";
    
	// Get an instance of the Database
	public static function getInstance() {

        // If no instance then make one
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }
    
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
	
		// error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);
		}
    }
    
	// magic method clone is empty to prevent duplication of connection
    private function __clone() {}
    
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}

// create connection by instantiation Database class
$database = new Database();
$db = $database->getConnection();
?>
