<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Data Departments</h2>
  <a class="btn btn-primary" href="index.php?controller=department&action=create">Add New Department</a>
</div>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>CODE</th>
        <th>DEPARTMENT NAME</th>
        <th>FACULTY</th>
        <th style="width: 150px;">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($departments)): ?>
        <?php foreach ($departments as $row): ?>
          <tr>
            <th><?= htmlspecialchars((string) $row['id']) ?></th>
            <td><?= htmlspecialchars($row['code']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['faculty']) ?></td>
            <td>
              <a class="btn btn-success" href="index.php?controller=department&action=edit&id=<?= (int) $row['id'] ?>">Edit</a>
              <a class="btn btn-danger" href="index.php?controller=department&action=delete&id=<?= (int) $row['id'] ?>" onclick="return confirm('Delete this department?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center text-muted">No department data available.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>
