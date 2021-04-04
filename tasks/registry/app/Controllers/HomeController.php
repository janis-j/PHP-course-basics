<?php

namespace App\Controllers;

use App\Services\StorePersonRequest;
use App\Services\StorePersonService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    private StorePersonService $service;
    private Environment $twig;

    public function __construct(StorePersonService $storePersonService)
    {
        $this->service = $storePersonService;
        $loader = new FilesystemLoader('/home/janis/PhpstormProjects/PHP-course/tasks/registry/app/Views');
        $this->twig = new Environment($loader);
    }

    public function index()
    {
        echo $this->twig->render('HomeView.twig');
    }

    public function search()
    {
        echo $this->twig->render('HomeView.twig', [
            'personsList' => $this->service->executeSearch()->collection(),
            'post' => $_POST
        ]);
    }

    public function store()
    {
        $validation = new Validation();
        $validId = $validation->id($_POST['id']);
        $validName = $validation->oneWord($_POST['name']);
        $validSurname = $validation->oneWord($_POST['surname']);
        $validAge = $validation->oneWord($_POST['age']);


        if ($validId === '' && $validName === '' && $validSurname === '') {
            $this->service->executeStore(new StorePersonRequest(
                $_POST["id"],
                $_POST["name"],
                $_POST["surname"],
                $_POST["age"],
                $_POST['addressName'] . " " . $_POST['addressNumber'] . ", " . $_POST['addressCity'] . ", "
                . $_POST['addressCountry'],
                $_POST["description"]
            ));
        }
        require_once 'Validation.php';
        echo $this->twig->render('HomeView.twig',
            [
                'validId' => $validId,
                'validName' => $validName,
                'validSurname' => $validSurname,
                'validAge' => $validAge,
            ]
        );
    }
}