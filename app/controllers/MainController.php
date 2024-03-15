<?php

namespace app\controllers;
use app\core\Controller;

class MainController extends Controller
{

    public function homepage()
    {
        $template = $this->twig->load('main/homepage.twig');
        $homepageData = [
            'title' => 'Homepage Title',
        ];

        echo $template->render($homepageData);
    }

    public function notFound() {
    $template = $this->twig->load('404.twig');
    echo $template->render();
}

}