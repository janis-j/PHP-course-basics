<?php

namespace App\Controllers;

use App\Services\DeleteChangePersonService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DeleteChangeController
{
    private DeleteChangePersonService $service;
    private Environment $twig;

    public function __construct(DeleteChangePersonService $service)
    {
        $this->service = $service;
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function delete()
    {
        $this->service->executeDelete($_POST['pickPerson']);
        echo $this->twig->render('HomeView.twig');
    }

    public function change()
    {
        $this->service->executeChange([$_POST['descriptionInput'],$_POST['pickPerson']]);
        echo $this->twig->render('HomeView.twig');
    }

}