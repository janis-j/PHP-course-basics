<?php

namespace App\Controllers;

use App\Services\StorePersonRequest;
use App\Services\StorePersonService;
use App\Services\TokenService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class RegistryController
{
    private StorePersonService $service;
    private Environment $twig;
    private TokenService $tokenService;

    public function __construct(StorePersonService $storePersonService, TokenService $tokenService)
    {
        $this->service = $storePersonService;
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
        $this->tokenService = $tokenService;
    }

    public function index(): string
    {
        if(!$this->tokenService->validation('id',$_SESSION['id'])){
            session_destroy();
        }
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
        }
        return $this->twig->render('HomeView.twig');
    }

    public function search(): string
    {
        return $this->twig->render('HomeView.twig', [
            'personsList' => $this->service->executeSearch($_POST['radioInput'], $_POST['textInput'])->collection(),
            'post' => $_POST
        ]);
    }

    public function store(): string
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
        return $this->twig->render('HomeView.twig', [
            'validId' => $validId,
            'validName' => $validName,
            'validSurname' => $validSurname,
            'validAge' => $validAge,
        ]);
    }
}