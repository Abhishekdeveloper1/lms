<?php
namespace LMS\models;
use LMS\models\BaseModel;
use PDO;

class User extends BaseModel {
    private $table_name = "users";

    public $id;
    public $name;
    public $email;
    public $password;
    public $role_id;

    public function register() {
        // Check if the user already exists
        $query = "SELECT * FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // User already exists
        }

        // Insert the user into the database
        $query = "INSERT INTO {$this->table_name} (name, email, password, role_id) 
                  VALUES (:name, :email, :password, :role_id)";
        $stmt = $this->conn->prepare($query);

        // Hash the password
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        // Bind parameters
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role_id', $this->role_id);

        // Execute the query
        return $stmt->execute();
    }

    public function login() {
        // Check if the email exists
        $query = "SELECT * FROM {$this->table_name} WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if (password_verify($this->password, $user['password'])) {
                return $user; // Return user details on successful login
            } else {
                return false; // Invalid password
            }
        } else {
            return false; // User not found
        }
    }
}