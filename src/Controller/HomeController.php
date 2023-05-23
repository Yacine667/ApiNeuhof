<?php

namespace App\Controller;



use App\HttpClient\NHFHttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    // #[Route('/home', name: 'app_home')]
    #[Route('/home', name: 'app_home', methods: ['GET'])]
    public function index(NHFHttpClient $bga): Response
    {
        $result = $bga->getGames();
        $result = json_decode($result,true);
        return $this->render('home/index.html.twig', [
            'data' => $result,
        ]);
    }

    #[Route('/games', name: 'app_games', methods: ['GET'])]
    public function displayGames(NHFHttpClient $bga, Request $request) {
        
        return new Response($bga->getGames());
    }

    // #[Route('/game', name: 'app_game', methods: ['POST'])]
    // public function displayGame(BGAHttpClient $bga, Request $request) {
    //     $search = $request->request->get('gameId');
    //     return new Response($bga->getGame($search));
    // }
}
