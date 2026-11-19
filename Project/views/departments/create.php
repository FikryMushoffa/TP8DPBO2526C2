<?php require __DIR__ . '/../templates/header.php'; ?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=department&action=store">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="mb-0">Create Department</h2>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label">CODE</label>
          <input type="text" name="code" class="form-control" placeholder="e.g. ILKOM" required>
        </div>

        <div class="mb-3">
          <label class="form-label">DEPARTMENT NAME</label>
          <input type="text" name="name" class="form-control" placeholder="e.g. Ilmu Komputer" required>
        </div>

        <div class="mb-3">
          <label class="form-label">FACULTY</label>
          <input type="text" name="faculty" class="form-control" placeholder="e.g. FPMIPA" required>
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Submit</button>
          <a class="btn btn-info" href="index.php?controller=department&action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>

<?php require __DIR__ . '/../templates/footer.php'; ?>
