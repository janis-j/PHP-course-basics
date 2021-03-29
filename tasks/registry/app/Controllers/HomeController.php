<?php

namespace App\Controllers;

use App\Models\Registry;

class HomeController
{
    public function index()
    {
        $registry = new Registry();
        $registry->search();
        $registry->changeDescriptionInDb();
        $registry->removeFromDb();
        $registry->insertNewPerson();

        require_once '../app/Views/HomeView.php';
    }
}