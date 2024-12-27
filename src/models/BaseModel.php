<?php
namespace LMS\models;
use LMS\config\Database;

class BaseModel extends Database {
    public function __construct() {
        parent::__construct(); // Call the Database constructor to initialize the connection
    }
}
