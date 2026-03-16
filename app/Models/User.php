<?php

class User {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function findByUsername($username) {
        $sql = 'SELECT * FROM users WHERE username = ?';
        $stmt = $this->db->query($sql, [$username]);
        return $stmt->fetch();
    }
    
    public function create($data) {
        $sql = 'INSERT INTO users (username, password, role, created_at) VALUES (?, ?, ?, ?)';
        $stmt = $this->db->query($sql, [
            $data['username'],
            $data['password'],
            $data['role'] ?? 'user',
            date('Y-m-d H:i:s')
        ]);
        return $this->db->lastInsertId();
    }
    
    public function getAll() {
        $sql = 'SELECT * FROM users';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
