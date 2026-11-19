<?php

require_once __DIR__ . '/Model.php';

class Course extends Model
{
    public function getAll(): array
    {
        $sql = 'SELECT courses.*, lecturers.name AS lecturer_name
                FROM courses
                LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id
                ORDER BY courses.id ASC';
        return $this->fetchAll($sql);
    }

    public function getById(int $id): ?array
    {
        $sql = 'SELECT * FROM courses WHERE id = ?';
        return $this->fetchOne($sql, 'i', [$id]);
    }

    public function create(array $data): bool
    {
        $lecturerId = !empty($data['lecturer_id']) ? (int) $data['lecturer_id'] : null;
        $sql = 'INSERT INTO courses (course_code, course_name, sks, semester, lecturer_id)
                VALUES (?, ?, ?, ?, ?)';
        return $this->execute($sql, 'ssisi', [
            trim($data['course_code']),
            trim($data['course_name']),
            (int) $data['sks'],
            trim($data['semester']),
            $lecturerId,
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $lecturerId = !empty($data['lecturer_id']) ? (int) $data['lecturer_id'] : null;
        $sql = 'UPDATE courses
                SET course_code = ?, course_name = ?, sks = ?, semester = ?, lecturer_id = ?
                WHERE id = ?';
        return $this->execute($sql, 'ssisii', [
            trim($data['course_code']),
            trim($data['course_name']),
            (int) $data['sks'],
            trim($data['semester']),
            $lecturerId,
            $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM courses WHERE id = ?';
        return $this->execute($sql, 'i', [$id]);
    }
}
