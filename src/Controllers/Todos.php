<?php
namespace App\Controllers;

use App\Models\Todo;

class Todos extends AbstractController {
    public function view() {
        $vars = [];
        $entityManager = getEntityManager();
        if (!empty($_POST)) {
            $todo = new Todo($_POST['new_task']);
            $entityManager->persist($todo);
            $entityManager->flush();
            $vars['new_todo'] = $todo;
        }
        $todoRepository = $entityManager->getRepository(Todo::class);
        $vars['items'] = $todoRepository->findAll();
        $content = $this->viewTemplate('todos', $vars);
        $title = 'Todo list';

        return $this->viewWrapper($title, $content);
    }
}