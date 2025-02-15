<?php

class Car extends Model {
    public function __construct() {
        parent::__construct();

        // Override the table name
        $this->table = 'cars';
    }
}