<?php
/**
 * Data Access Object (DAO) class. Contains all DB access code.
 * $dao = new Dao();
 * $result = $dao->getAllRows();
 */
class Dao
{
	private $host ="localhost";
	private $dbname = "webdev";
	private $user = "csstudent";
	private $password = "Asdfpl137979";

	/**
	 * Creates a new PDO connection and returns the handle.
	 */
	private function getConnection()
	{
		// Create PDO instance using MySQL connection string.
		$conn = new PDO("mysql:dbname={$this->dbname};host={$this->host};",
						"$this->user", "$this->password");
		// Make sure to turn on exceptions for debugging.
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $conn;
	}
	
	public function getUsers()
	{
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM users");
		
	}

	
	public function userExists($email)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		//var_dump($stmt);
		if($stmt->fetch()) {
			return true;
		} else{
			return false;
		}
	}


	public function addUser($email, $password, $name)
	{
		$conn = $this->getConnection();
		$query = "INSERT INTO users (email, password, name) 
				  VALUES (:email, :password, :name)";
		
		$stmt = $conn->prepare($query);		
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':name', $name);

		try{
			$stmt->execute();
			return true;
		} catch(PDOException $e) {
			echo $e->getMessage();

			return false;
		}
	}
 
	/**
	 * Returns all rows in the test table. No user input.
	 */
	public function getAllRows()
	{
		// Get a connection to the database.
		$conn = $this->getConnection();

		// Execute the query. If we aren't accepting any user input,
		// then we can use a query instead of a prepared statement.
		return $conn->query("SELECT * FROM test");
	}

	/**
	 * Returns rows with email column equal to the given email.
	 * Accepts user input. DON'T DO THIS!!
	 */
	public function getRowBAD($email)
	{
		$conn = $this->getConnection();

		// This is BAD. Never insert user input directly into a query
		// string. Try passing in "'; DROP TABLE test;'" as the $email
		// parameter and see what happens.
		$getQuery = "SELECT * FROM test WHERE email = '$email'";
		return $conn->query($getQuery);
	}


	/**
	 * Returns rows with email column equal to the given email.
	 * Accepts user input.
	 */
	public function getRow($email)
	{
		$conn = $this->getConnection();

		// Setup the query string. ':email' is a "named placeholder". We will
		// tie ':email' to an actual value before we execute the prepared
		// statement.
		$query = "SELECT * FROM test WHERE email = :email";

		// Create the prepared statement (returns a PDOStatement object).
		$stmt = $conn->prepare($query);

		// Bind the $email parameter passed into the method to the ':email'
		// placeholder of the query.
		$stmt->bindParam(':email', $email);

		// Finally, execute the statement.
		$stmt->execute();

		// And return the result (an array of rows).
		return $stmt->fetchAll();
	}

	/**
	 * Adds a row with email column equal to the given email.
	 * Accepts user input. DON'T DO THIS!!
	 */
	public function addRowBAD($email)
	{
		$conn = $this->getConnection();

		// This is BAD. Never insert user input directly into a query
		// string. Try passing in "'; DROP TABLE test; --" as the $email
		// parameter and see what happens.
		// exec returns the number of rows affected.
		$count = $conn->exec("INSERT INTO test (email) VALUES ('$email')");
	}

	/**
	 * Adds a row to the test table with the given email attribute (aka column).
	 * Accepts user input.
	 */
	public function addRow($email)
	{
		$conn = $this->getConnection();

		// Setup the insert string. ':email' is a "named placeholder". We will
		// tie ':email' to an actual value before we execute the prepared
		// statement.
		$query = "INSERT INTO test (email) VALUES (:email)";

		// Create the prepared statement (returns a PDOStatement object).
		$stmt = $conn->prepare($query);

		// Bind the $email parameter passed into the method to the ':email'
		// placeholder of the query.
		$stmt->bindParam(':email', $email);

		// Finally, execute the statement.
		$stmt->execute();
	}
}
?>
