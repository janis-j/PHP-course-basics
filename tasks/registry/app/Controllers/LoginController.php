<?php

namespace App\Controllers;

use App\Services\LoginPersonService;
use App\Services\TokenService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class LoginController
{
    private LoginPersonService $loginPersonService;
    private TokenService $tokenService;
    private Environment $twig;

    public function __construct(LoginPersonService $loginPersonService, TokenService $tokenService)
    {
        $this->loginPersonService = $loginPersonService;
        $this->tokenService = $tokenService;

        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function index(): string
    {
        $link = '';
        $errorMessage = '';
        if (isset($_SESSION['_message']['loginError'])) {
            $errorMessage = $_SESSION['_message']['loginError'];
        }
        if (isset($_SESSION['_message']['link'])) {
            $link = $_SESSION['_message']['link'];
        }
        return $this->twig->render('LoginView.twig', [
            'loginError' => $errorMessage,
            'link' => $link
        ]);
    }

    public function login(): void
    {
        if (empty($_POST['idInput'])) {

            header('location: /login');

            $_SESSION['_message']['loginError'] = "Input must be filled";

        } else {

            if ($this->loginPersonService->execute($_POST['idInput'])) {

                header('location: /login');

                $_SESSION['_message']['link'] = $this->tokenService->execute($_POST['idInput']);
            } else {

                header('location: /login');

                $_SESSION['_message']['loginError'] = "Sorry, no such id in database";
            }
        }
    }

    public function executeLogin()
    {
        if ($this->tokenService->validation('token',$_GET['token'])) {
            header('location: /');
        }else{
            session_destroy();
            header('location: /login');
        }

    }
}