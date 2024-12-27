<?php
namespace LMS\config;
use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $db_name = 'lms2512202401234';
    private $username = 'root';
    private $password = 'pintu123';
    // private $conn;
    protected $conn;

    // public function __construct() {
    //     $this->conn = null;
    //     try {
    //         $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
    //         // Set the PDO error mode to exception
    //         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     } catch (PDOException $e) {
    //         // Log the error instead of echoing it
    //         error_log("Database Connection Error: " . $e->getMessage());
    //         die("Database connection error. Please try again later.");
    //     }
    // }

    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=lms2512202401234", "root", "pintu123");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage());
            die("Database connection failed.");
        }
    }
    public function fetchData($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Fetch Data Error: " . $e->getMessage());
            return false;
        }
    }

    public function fetchSingle($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Fetch Single Error: " . $e->getMessage());
            return false;
        }
    }

    public function insertData($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Insert Data Error: " . $e->getMessage());
            return false;
        }
    }

    public function updateData($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Update Data Error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteData($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Delete Data Error: " . $e->getMessage());
            return false;
        }
    }

    public function __destruct() {
        $this->conn = null; // Close the database connection
    }
}
