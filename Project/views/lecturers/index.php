<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Data Lecturers</h2>
  <a class="btn btn-primary" href="index.php?controller=lecturer&action=create">Add New Lecturer</a>
</div>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>NIDN</th>
        <th>PHONE</th>
        <th>JOIN DATE</th>
        <th>DEPARTMENT</th>
        <th style="width: 150px;">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($lecturers)): ?>
        <?php foreach ($lecturers as $row): ?>
          <tr>
            <th><?= htmlspecialchars((string) $row['id']) ?></th>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['nidn']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['join_date']) ?></td>
            <td><?= htmlspecialchars($row['department_name'] ?? '-') ?></td>
            <td>
              <a class="btn btn-success" href="index.php?controller=lecturer&action=edit&id=<?= (int) $row['id'] ?>">Edit</a>
              <a class="btn btn-danger" href="index.php?controller=lecturer&action=delete&id=<?= (int) $row['id'] ?>" onclick="return confirm('Delete this lecturer?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center text-muted">No lecturer data available.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>
