<?php

class Post {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function findBySlug($slug) {
        $sql = 'SELECT * FROM posts WHERE slug = ?';
        $stmt = $this->db->query($sql, [$slug]);
        return $stmt->fetch();
    }
    
    public function findById($id) {
        $sql = 'SELECT * FROM posts WHERE id = ?';
        $stmt = $this->db->query($sql, [$id]);
        return $stmt->fetch();
    }
    
    public function create($data) {
        $sql = 'INSERT INTO posts (title, content, author_id, slug, created_at) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->db->query($sql, [
            $data['title'],
            $data['content'],
            $data['author_id'],
            $data['slug'],
            date('Y-m-d H:i:s')
        ]);
        return $this->db->lastInsertId();
    }
    
    public function getAll($limit = null) {
        $sql = 'SELECT * FROM posts ORDER BY created_at DESC';
        if ($limit) {
            $sql .= ' LIMIT ?';
            $stmt = $this->db->query($sql, [$limit]);
        } else {
            $stmt = $this->db->query($sql);
        }
        return $stmt->fetchAll();
    }
    
    public function update($id, $data) {
        $sql = 'UPDATE posts SET title = ?, content = ?, slug = ? WHERE id = ?';
        $stmt = $this->db->query($sql, [
            $data['title'],
            $data['content'],
            $data['slug'],
            $id
        ]);
        return $stmt->rowCount();
    }
    
    public function delete($id) {
        $sql = 'DELETE FROM posts WHERE id = ?';
        $stmt = $this->db->query($sql, [$id]);
        return $stmt->rowCount();
    }
}
