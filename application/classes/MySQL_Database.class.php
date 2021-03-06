<?php

/**
* MySQLDatabase Class
**/

//namespace Database/MySQL;

class MySQL_Database extends Database{

    private $connection;
    public $last_query;
    private $magic_quotes_active;
    private $real_escape_string_exists;

// Create a object
    public function __construct() {
        $this->open_connection();
        $this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists("mysqli_real_escape_string");

    }

// Create a database connection function
    public function open_connection() {
	$config = config()->mysql;
        $this->connection = mysqli_connect($config['host'], $config['user'], $config['password']);
        if (!$this->connection) {
            die("Database connection failed: " . mysqli_error($this->connection));
        } else {
            // 2. Select a database to use
            mysqli_set_charset($this->connection, $config['charset']);
            $db_select = mysqli_select_db( $this->connection, $config['database']);
            if (!$db_select) {
                die("Database selection failed: " . mysqli_error($this->connection));
            }
        }
    }

// Close a database connection function
    public function close_connection() {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

// Perform database query function
    public function query($sql) {
        $this->last_query = $sql;
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);

        return $result;
    }

// hz
    public function escape_value($value) {
        // i.e. PHP >= v4.3.0
        $value = htmlspecialchars(trim($value));
        if ($this->real_escape_string_exists) { // PHP v4.3.0 or higher
            // undo any magic quote effects so mysqli_real_escape_string can do the work
            if ($this->magic_quotes_active) {
                $value = stripslashes($value);
            }
            $value = mysqli_real_escape_string($this->connection, $value);
        } else { // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manualy
            if (!$this->magic_quotes_active) {
                $value = addslashes($value);
            }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;
    }

// "database-neutral" methods	
    public function fetch_array($result_set) {
        return mysqli_fetch_array($result_set);
    }

    public function num_rows($result_set) {
        return mysqli_num_rows($result_set);
    }

    public function insert_id() {
        // get the last id inserted over the current db connection
        return mysqli_insert_id($this->connection);
    }

    public function affected_rows() {
        return mysqli_affected_rows($this->connection);
    }

// Confirm database query function
    protected function confirm_query($result) {
        if (!$result) {
            $output = "Database query failed: " . mysqli_error($this->connection) . "<br />";
            $output .= "Last SQL query: ".$this->last_query ;
            return($output);
        }
    }

}
