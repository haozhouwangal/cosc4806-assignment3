<?php
class User {
    public $username;
    public $password;
    public $is_authenticated = false;

    public function __construct() {}

    public function authenticate() {
        require_once 'database.php';
        $db = db_connect();
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($this->password, $user['password'])) {
            $this->is_authenticated = true;
        }
    }

    public function register() {
        require_once 'database.php';
        $db = db_connect();
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $hash);
        return $stmt->execute();
    }
}
