<?php
class Photo extends Model {
    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM photos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM photos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($filename) {
        $stmt = $this->pdo->prepare("INSERT INTO photos (filename) VALUES (?)");
        $stmt->execute([$filename]);
    }

    public function update($id, $filename) {
        $stmt = $this->pdo->prepare("UPDATE photos SET filename = ? WHERE id = ?");
        $stmt->execute([$filename, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM photos WHERE id = ?");
        $stmt->execute([$id]);
    }
}
