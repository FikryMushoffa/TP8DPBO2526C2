<?php

require_once __DIR__ . '/Model.php';

class Department extends Model
{
    public function getAll(): array
    {
        $sql = 'SELECT * FROM departments ORDER BY id ASC';
        return $this->fetchAll($sql);
    }

    public function getById(int $id): ?array
    {
        $sql = 'SELECT * FROM departments WHERE id = ?';
        return $this->fetchOne($sql, 'i', [$id]);
    }

    public function create(array $data): bool
    {
        $sql = 'INSERT INTO departments (code, name, faculty) VALUES (?, ?, ?)';
        return $this->execute($sql, 'sss', [
            trim($data['code']),
            trim($data['name']),
            trim($data['faculty']),
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE departments SET code = ?, name = ?, faculty = ? WHERE id = ?';
        return $this->execute($sql, 'sssi', [
            trim($data['code']),
            trim($data['name']),
            trim($data['faculty']),
            $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM departments WHERE id = ?';
        return $this->execute($sql, 'i', [$id]);
    }
}
