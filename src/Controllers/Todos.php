<?php
namespace App\Controllers;

use App\Models\Todo;

class Todos extends AbstractController {
    public function view() {
        $vars = [];
        $entityManager = getEntityManager();
        $todoRepository = $entityManager->getRepository(Todo::class);
        $vars['items'] = $todoRepository->findAll();
        $content = $this->viewTemplate('todos', $vars);
        $title = 'Todo list';

        return $this->viewWrapper($title, $content);
    }

    public function submit(){
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
        return json_encode($vars['items']);
    }

    public function edit() {
        $task_id = $_GET['id'];
        $entityManager = getEntityManager();
        $todoRepository = $entityManager->getRepository(Todo::class);
        $task = $todoRepository->find($task_id);
        $task->changeActive();
        $entityManager->flush();
        // return json_encode($task);
        $tasks = $todoRepository->findAll();
        return json_encode($tasks);
    }

    public function delete() {
        $task_id = $_GET['id'];
        $entityManager = getEntityManager();
        $todoRepository = $entityManager->getRepository(Todo::class);
        $task = $todoRepository->find($task_id);
        $entityManager->remove($task);
        $entityManager->flush();
        $tasks = $todoRepository->findAll();
        return json_encode($tasks);
    }

}