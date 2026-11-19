<?php

/**
 * Base Controller providing shared view rendering and redirect helpers.
 */
class Controller
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../views/' . $view . '.php';
    }

    protected function redirect(string $controller, string $action = 'index'): void
    {
        header("Location: index.php?controller={$controller}&action={$action}");
        exit;
    }
}
