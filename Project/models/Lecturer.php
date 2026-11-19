<?php

require_once __DIR__ . '/Model.php';

class Lecturer extends Model
{
    public function getAll(): array
    {
        $sql = 'SELECT lecturers.*, departments.name AS department_name
                FROM lecturers
                LEFT JOIN departments ON lecturers.department_id = departments.id
                ORDER BY lecturers.id ASC';
        return $this->fetchAll($sql);
    }

    public function getById(int $id): ?array
    {
        $sql = 'SELECT * FROM lecturers WHERE id = ?';
        return $this->fetchOne($sql, 'i', [$id]);
    }

    public function create(array $data): bool
    {
        $departmentId = !empty($data['department_id']) ? (int) $data['department_id'] : null;
        $sql = 'INSERT INTO lecturers (name, nidn, phone, join_date, department_id)
                VALUES (?, ?, ?, ?, ?)';
        return $this->execute($sql, 'ssssi', [
            trim($data['name']),
            trim($data['nidn']),
            trim($data['phone']),
            $data['join_date'],
            $departmentId,
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $departmentId = !empty($data['department_id']) ? (int) $data['department_id'] : null;
        $sql = 'UPDATE lecturers
                SET name = ?, nidn = ?, phone = ?, join_date = ?, department_id = ?
                WHERE id = ?';
        return $this->execute($sql, 'ssssii', [
            trim($data['name']),
            trim($data['nidn']),
            trim($data['phone']),
            $data['join_date'],
            $departmentId,
            $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM lecturers WHERE id = ?';
        return $this->execute($sql, 'i', [$id]);
    }
}
