<?php

class Model {
    protected $table;
    protected $db;
    
    public function __construct() {
        // Set the database table name from the object class
        $this->table = strtolower(get_class($this));
        $this->db = DB::getInstance();
    }

    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $values = array_values($data);
        $placeholders = implode(', ', array_fill(0, count($values), '?'));

        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        return $this->db->query($sql, $values);
    }

    public function update($data, $id) {
        try {
            $columns = array_keys($data);
            $values = array_values($data);

            $set = '';
            $n = count($data);
            for ($i = 0; $i < $n; $i++) {
                $set .= $columns[$i] . ' = ?';
                if ($i < $n - 1) {
                    $set .= ', ';
                }
            }

            $sql = "UPDATE $this->table SET $set WHERE id = ?";
            $values[] = $id;
            return $this->db->query($sql, $values);
        } catch (PDOException $e) {
            // die($e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE id = ?";
            return $this->db->query($sql, [$id]);
        } catch (PDOException $e) {
            // die($e->getMessage());
            return false;
        }
    }

    public function all() {
        try {
            $sql = "SELECT * FROM $this->table";
            return $this->db->fetchAll($sql);
        } catch (PDOException $e) {
            // die($e->getMessage());
            return [];
        }
    }

    public function one($id) {
        try {
            $sql = "SELECT * FROM $this->table WHERE id = ?";
            return $this->db->fetch($sql, [$id]);
        } catch (PDOException $e) {
            // die($e->getMessage());
            return null;
        }
    }
}