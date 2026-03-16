<?php

class Work {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function findBySlug($slug) {
        $sql = 'SELECT * FROM works WHERE slug = ?';
        $stmt = $this->db->query($sql, [$slug]);
        return $stmt->fetch();
    }
    
    public function findById($id) {
        $sql = 'SELECT * FROM works WHERE id = ?';
        $stmt = $this->db->query($sql, [$id]);
        return $stmt->fetch();
    }
    
    public function create($data) {
        $sql = 'INSERT INTO works (title, subtitle, slug, image_url, tags, status, summary, author_id, sort_order, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->db->query($sql, [
            $data['title'],
            $data['subtitle'],
            $data['slug'],
            $data['image_url'],
            implode(',', $data['tags']),
            $data['status'] ?? 'ready',
            $data['summary'],
            $data['author_id'],
            $data['sort_order'] ?? 0,
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')
        ]);
        return $this->db->lastInsertId();
    }
    
    public function getAll($orderBy = 'sort_order') {
        $sql = sprintf('SELECT * FROM works ORDER BY %s ASC', $orderBy);
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    
    public function update($id, $data) {
        $sql = 'UPDATE works SET title = ?, subtitle = ?, slug = ?, image_url = ?, tags = ?, status = ?, summary = ?, sort_order = ?, updated_at = ? WHERE id = ?';
        $stmt = $this->db->query($sql, [
            $data['title'],
            $data['subtitle'],
            $data['slug'],
            $data['image_url'],
            implode(',', $data['tags']),
            $data['status'],
            $data['summary'],
            $data['sort_order'],
            date('Y-m-d H:i:s'),
            $id
        ]);
        return $stmt->rowCount();
    }
    
    public function delete($id) {
        $sql = 'DELETE FROM works WHERE id = ?';
        $stmt = $this->db->query($sql, [$id]);
        return $stmt->rowCount();
    }
}
