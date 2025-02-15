<?php

class DB {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'),
                Config::get('mysql/user'),
                Config::get('mysql/pass')
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo ("Connected");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function fetch($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql, $params);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql, $params);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}