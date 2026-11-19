<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Lecturer.php';

class CourseController extends Controller
{
    private Course $courseModel;
    private Lecturer $lecturerModel;

    public function __construct()
    {
        $this->courseModel = new Course();
        $this->lecturerModel = new Lecturer();
    }

    public function index(): void
    {
        $this->render('courses/index', [
            'pageTitle'        => 'Courses',
            'activeController' => 'course',
            'courses'          => $this->courseModel->getAll(),
        ]);
    }

    public function create(): void
    {
        $this->render('courses/create', [
            'pageTitle'        => 'Create Course',
            'activeController' => 'course',
            'lecturers'        => $this->lecturerModel->getAll(),
        ]);
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $this->courseModel->create($_POST);
        }
        $this->redirect('course');
    }

    public function edit(): void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $course = $this->courseModel->getById($id);
        if (!$course) {
            $this->redirect('course');
        }

        $this->render('courses/edit', [
            'pageTitle'        => 'Update Course',
            'activeController' => 'course',
            'course'           => $course,
            'lecturers'        => $this->lecturerModel->getAll(),
        ]);
    }

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $id = (int) $_POST['id'];
            $this->courseModel->update($id, $_POST);
        }
        $this->redirect('course');
    }

    public function delete(): void
    {
        if (isset($_GET['id'])) {
            $this->courseModel->delete((int) $_GET['id']);
        }
        $this->redirect('course');
    }
}
