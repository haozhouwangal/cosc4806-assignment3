<?php

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_DATABASE', 'cosc4806');
define('DB_USER', 'root');
define('DB_PASS', '');

function db_connect() {
    try {
        $dbh = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
        return $dbh;
    } catch (PDOException $e) {
        die("DB Connection failed: " . $e->getMessage());
    }
}
