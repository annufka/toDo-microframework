<?php
namespace App\Controllers;

class Homepage extends AbstractController {
    public function view() {
        $content = $this->viewTemplate('homepage');
        $title = 'Homepage ' . time();
        return $this->viewWrapper($title, $content);
    }

}