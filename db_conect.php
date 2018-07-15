<?php
class DBController {
    private $conn = "";
    private $host = "localhost";
    private $user = "st8487";
    private $password = "5af584411cdeb171942181";
    private $database = "test1";

    function __construct() {
        $conn = $this->connectDB();
        if(!empty($conn)) {
            $this->conn = $conn;
        }
    }

    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
                mysqli_set_charset( $conn, 'utf8');
                return $conn;
        }

    function runSelectQuery($query) {
        $result = mysqli_query($this->conn,$query);
        while($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function booleanQuery($query) {
        $result = mysqli_query($this->conn,$query);
        if($result === true){
            return $result;
        }
    }
	
	function insertQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function runQuery($query) {
        $result = mysqli_query($this->conn,$query);
        $row  = mysqli_fetch_array($result);

        if(!empty($row)){
            return $row;
		}
	}
}
