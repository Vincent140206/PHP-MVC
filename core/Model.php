<?php
class Model {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=photo", "root", "280406");
    }
}
