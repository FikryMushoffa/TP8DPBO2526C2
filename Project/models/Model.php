<?php

/**
 * Base Model class providing a shared MySQLi connection and
 * prepared-statement query helpers for child models.
 */
class Model
{
    protected mysqli $conn;

    public function __construct()
    {
        require __DIR__ . '/../config/connection.php';
        $this->conn = new mysqli(
            $db_config['servername'],
            $db_config['username'],
            $db_config['password'],
            $db_config['db_name']
        );

        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }

        $this->conn->set_charset('utf8mb4');
    }

    /**
     * Prepare and execute a SQL statement with optional bound parameters.
     */
    protected function executeQuery(string $sql, string $types = '', array $params = []): mysqli_stmt
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die('Prepare failed: ' . $this->conn->error);
        }

        if ($types !== '' && !empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }

        return $stmt;
    }

    /**
     * Fetch all rows as an associative array.
     */
    protected function fetchAll(string $sql, string $types = '', array $params = []): array
    {
        $stmt = $this->executeQuery($sql, $types, $params);
        $result = $stmt->get_result();
        $rows = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $rows;
    }

    /**
     * Fetch a single row as an associative array, or null if not found.
     */
    protected function fetchOne(string $sql, string $types = '', array $params = []): ?array
    {
        $stmt = $this->executeQuery($sql, $types, $params);
        $result = $stmt->get_result();
        $row = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $row ?: null;
    }

    /**
     * Execute an INSERT, UPDATE, or DELETE statement.
     */
    protected function execute(string $sql, string $types = '', array $params = []): bool
    {
        $stmt = $this->executeQuery($sql, $types, $params);
        $stmt->close();
        return true;
    }

    public function __destruct()
    {
        if (isset($this->conn)) {
            $this->conn->close();
        }
    }
}
