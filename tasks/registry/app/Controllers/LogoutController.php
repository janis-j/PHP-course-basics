<?php

namespace App\Controllers;

class LogoutController
{
    public function logout()
    {
        header('Location: /login');
        session_destroy();
    }
}