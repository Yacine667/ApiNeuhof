<?php

namespace App\HttpClient;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NHFHttpClient extends AbstractController {

     /**
      * @var HttpClientInterface
      */

     private $httpClient;

     /**
      * NHFHttpClient constructor.
      *     
      * @param HttpClientInterface $nhf     
      */

    public function __construct(HttpClientInterface $nhf)
    {
        $this->httpClient = $nhf;
    }

    public function getGames(){

        
        $response = $this->httpClient->request('GET', "/api/actualites.json", [
            'verify_peer' => false, 
        ]);
        
        return $response->getContent();       
    }

    public function getGame($search){

        $client_id = $this->getParameter('client_id');
        $response = $this->httpClient->request('GET', "/api/search?ids=$search&pretty=true&client_id=$client_id", [
            'verify_peer' => false,
        ]);
        return $response->getContent();
    }

}
?>