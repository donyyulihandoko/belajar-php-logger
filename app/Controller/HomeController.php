<?php

namespace App\Controller;

class HomeController
{
    public function index()
    {
        $model = [
            'title' => "Belajar PHP MVC",
            'content' => 'Selamat Belajar PHP MVC'
        ];

        echo "HomeController.index";
    }

    public function hello()
    {
        echo "HomeController.hello";
    }

    public function world()
    {
        echo "HomeController.world";
    }

    public function login(): void
    {
        $request = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        $user = [];

        $response = [];
    }
}
