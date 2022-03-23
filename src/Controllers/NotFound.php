<?php
namespace App\Controllers;

class NotFound extends AbstractController {
    public function view() {
        $content = $this->viewTemplate('not-found');
        $title = 'Page not found ' . time();
        return $this->viewWrapper($title, $content);
    }

    public function wrongSubmitMethodError() {
        header('Content-Type: application/json');
        return json_encode([
            "name" => "It`s wrong method =("
        ]);
    }

}