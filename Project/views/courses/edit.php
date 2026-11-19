<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=course&action=update">
    <div class="card shadow-sm">
      <div class="card-header bg-warning text-white text-center">
        <h2 class="mb-0">Update Course</h2>
      </div>
      <div class="card-body">
        <input type="hidden" name="id" value="<?= (int) $course['id'] ?>">

        <div class="mb-3">
          <label class="form-label">COURSE CODE</label>
          <input type="text" name="course_code" value="<?= htmlspecialchars($course['course_code']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">COURSE NAME</label>
          <input type="text" name="course_name" value="<?= htmlspecialchars($course['course_name']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">SKS</label>
          <input type="number" name="sks" value="<?= (int) $course['sks'] ?>" class="form-control" min="1" max="6" required>
        </div>

        <div class="mb-3">
          <label class="form-label">SEMESTER</label>
          <input type="text" name="semester" value="<?= htmlspecialchars($course['semester']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">LECTURER</label>
          <select name="lecturer_id" class="form-select" required>
            <option value="">-- Select Lecturer --</option>
            <?php foreach ($lecturers as $lecturer): ?>
              <?php $selected = ((int) $lecturer['id'] === (int) $course['lecturer_id']) ? 'selected' : ''; ?>
              <option value="<?= (int) $lecturer['id'] ?>" <?= $selected ?>><?= htmlspecialchars($lecturer['name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Submit</button>
          <a class="btn btn-info" href="index.php?controller=course&action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>
