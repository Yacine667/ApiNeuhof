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

    public function getActus(){

        
        $response = $this->httpClient->request('GET', "/api/actualites.json", [
            'verify_peer' => false, 
        ]);
        
        return $response->getContent();       
    }


}
?>