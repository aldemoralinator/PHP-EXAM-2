<?php 

class Database
{

    private $servername = "localhost";
    private $username = "aldem";
    private $password = "secret";
    private $database;
    private $conn;

    public function __construct($db) {
        $this->database = $db;
        
        $this->conn = new mysqli(
            $this->servername, 
            $this->username, 
            $this->password, 
            $this->database
        );

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insert($table, $data)
    {
        $keynames;
        $values;

        foreach ($data as $key => $value) {

            $keynames .= $key;

            if ($value == "now()") {
                $values .= $value;
            } else {
                $values .= "'".$value."'";
            }

            if (!($key === array_key_last($data))) {
                $keynames .= ", ";
                $values .= ", ";
            }

        }

        $query = "INSERT INTO ".$table." (".$keynames.") VALUES (".$values.")";
        
        if ($this->conn->query($query) === TRUE) {
            echo "New record created successfully <br />";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function select()
    {
        // TODO::: do something..
    }

    function __destruct() {
        $this->conn->close();
    }






}







?>