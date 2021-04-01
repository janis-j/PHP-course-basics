<?php

namespace App\Controllers;

use App\Services\DeleteChangePersonService;

class DeleteChangeController
{
    private DeleteChangePersonService $service;

    public function __construct(DeleteChangePersonService $service)
    {
        $this->service = $service;
    }

    public function delete()
    {
        $this->service->executeDelete($_POST['pickPerson']);
        require_once '../app/Views/HomeView.php';
    }

    public function change()
    {
        $this->service->executeChange([$_POST['descriptionInput'],$_POST['pickPerson']]);
        require_once '../app/Views/HomeView.php';
    }

}