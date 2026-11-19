<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Department.php';

class DepartmentController extends Controller
{
    private Department $departmentModel;

    public function __construct()
    {
        $this->departmentModel = new Department();
    }

    public function index(): void
    {
        $this->render('departments/index', [
            'pageTitle'        => 'Departments',
            'activeController' => 'department',
            'departments'      => $this->departmentModel->getAll(),
        ]);
    }

    public function create(): void
    {
        $this->render('departments/create', [
            'pageTitle'        => 'Create Department',
            'activeController' => 'department',
        ]);
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $this->departmentModel->create($_POST);
        }
        $this->redirect('department');
    }

    public function edit(): void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $department = $this->departmentModel->getById($id);
        if (!$department) {
            $this->redirect('department');
        }

        $this->render('departments/edit', [
            'pageTitle'        => 'Update Department',
            'activeController' => 'department',
            'department'       => $department,
        ]);
    }

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $id = (int) $_POST['id'];
            $this->departmentModel->update($id, $_POST);
        }
        $this->redirect('department');
    }

    public function delete(): void
    {
        if (isset($_GET['id'])) {
            $this->departmentModel->delete((int) $_GET['id']);
        }
        $this->redirect('department');
    }
}
