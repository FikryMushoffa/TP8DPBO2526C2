<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=lecturer&action=update">
    <div class="card shadow-sm">
      <div class="card-header bg-warning text-white text-center">
        <h2 class="mb-0">Update Lecturer</h2>
      </div>
      <div class="card-body">
        <input type="hidden" name="id" value="<?= (int) $lecturer['id'] ?>">

        <div class="mb-3">
          <label class="form-label">NAME</label>
          <input type="text" name="name" value="<?= htmlspecialchars($lecturer['name']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">NIDN</label>
          <input type="text" name="nidn" value="<?= htmlspecialchars($lecturer['nidn']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">PHONE</label>
          <input type="text" name="phone" value="<?= htmlspecialchars($lecturer['phone']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">JOIN DATE</label>
          <input type="date" name="join_date" value="<?= htmlspecialchars($lecturer['join_date']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">DEPARTMENT</label>
          <select name="department_id" class="form-select" required>
            <option value="">-- Select Department --</option>
            <?php foreach ($departments as $dept): ?>
              <?php $selected = ((int) $dept['id'] === (int) $lecturer['department_id']) ? 'selected' : ''; ?>
              <option value="<?= (int) $dept['id'] ?>" <?= $selected ?>><?= htmlspecialchars($dept['name']) ?> (<?= htmlspecialchars($dept['faculty']) ?>)</option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Submit</button>
          <a class="btn btn-info" href="index.php?controller=lecturer&action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>
