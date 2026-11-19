<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Department.php';

class LecturerController extends Controller
{
    private Lecturer $lecturerModel;
    private Department $departmentModel;

    public function __construct()
    {
        $this->lecturerModel = new Lecturer();
        $this->departmentModel = new Department();
    }

    public function index(): void
    {
        $this->render('lecturers/index', [
            'pageTitle'        => 'Lecturers',
            'activeController' => 'lecturer',
            'lecturers'        => $this->lecturerModel->getAll(),
        ]);
    }

    public function create(): void
    {
        $this->render('lecturers/create', [
            'pageTitle'        => 'Create Lecturer',
            'activeController' => 'lecturer',
            'departments'      => $this->departmentModel->getAll(),
        ]);
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $this->lecturerModel->create($_POST);
        }
        $this->redirect('lecturer');
    }

    public function edit(): void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $lecturer = $this->lecturerModel->getById($id);
        if (!$lecturer) {
            $this->redirect('lecturer');
        }

        $this->render('lecturers/edit', [
            'pageTitle'        => 'Update Lecturer',
            'activeController' => 'lecturer',
            'lecturer'         => $lecturer,
            'departments'      => $this->departmentModel->getAll(),
        ]);
    }

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $id = (int) $_POST['id'];
            $this->lecturerModel->update($id, $_POST);
        }
        $this->redirect('lecturer');
    }

    public function delete(): void
    {
        if (isset($_GET['id'])) {
            $this->lecturerModel->delete((int) $_GET['id']);
        }
        $this->redirect('lecturer');
    }
}
