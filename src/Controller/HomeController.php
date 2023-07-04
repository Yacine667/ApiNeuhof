<?php

namespace App\Controller;



use App\HttpClient\NHFHttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    // #[Route('/home', name: 'app_home')]
    #[Route('/home', name: 'app_home', methods: ['GET'])]
    public function index(NHFHttpClient $bga): Response
    {
        $actualites = $bga->getActus();
        $actualites = json_decode($actualites,true);
        return $this->render('home/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }


}
