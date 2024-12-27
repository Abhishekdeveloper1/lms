<?php
namespace LMS\config;

class Database {
    // private $host='localhost';
    // private $username='root';
    // private $password='pintu123';
    // private $database='lms2512202401234';
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct(string $host, string $username, string $password, string $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        // exit('11616');
        // Create a database connection using MySQLi
        $connection = new \mysqli($this->host, $this->username, $this->password, $this->database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }
}
