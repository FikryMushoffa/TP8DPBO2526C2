<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Data Courses</h2>
  <a class="btn btn-primary" href="index.php?controller=course&action=create">Add New Course</a>
</div>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>CODE</th>
        <th>COURSE NAME</th>
        <th>SKS</th>
        <th>SEMESTER</th>
        <th>LECTURER</th>
        <th style="width: 150px;">ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($courses)): ?>
        <?php foreach ($courses as $row): ?>
          <tr>
            <th><?= htmlspecialchars((string) $row['id']) ?></th>
            <td><?= htmlspecialchars($row['course_code']) ?></td>
            <td><?= htmlspecialchars($row['course_name']) ?></td>
            <td><?= htmlspecialchars((string) $row['sks']) ?></td>
            <td><?= htmlspecialchars($row['semester']) ?></td>
            <td><?= htmlspecialchars($row['lecturer_name'] ?? '-') ?></td>
            <td>
              <a class="btn btn-success" href="index.php?controller=course&action=edit&id=<?= (int) $row['id'] ?>">Edit</a>
              <a class="btn btn-danger" href="index.php?controller=course&action=delete&id=<?= (int) $row['id'] ?>" onclick="return confirm('Delete this course?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center text-muted">No course data available.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>
