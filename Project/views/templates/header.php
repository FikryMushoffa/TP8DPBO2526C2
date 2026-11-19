<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/bootstrap.min.css" rel="stylesheet">
  <title><?= htmlspecialchars($pageTitle ?? 'TP8 DPBO - MVC') ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?controller=lecturer&action=index">Campus Data</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= ($activeController ?? '') === 'lecturer' ? 'active' : '' ?>" href="index.php?controller=lecturer&action=index">Lecturers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($activeController ?? '') === 'department' ? 'active' : '' ?>" href="index.php?controller=department&action=index">Departments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($activeController ?? '') === 'course' ? 'active' : '' ?>" href="index.php?controller=course&action=index">Courses</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-4">
