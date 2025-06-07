<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Model\Starship;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection()
    {
        $starships = [
            new Starship(1, 'USS Enterprise (NCC-1701-D)', 'Galaxy-class', 'Jean-Luc Picard', 'Active'),
            new Starship(2, 'USS Voyager (NCC-74656)', 'Intrepid-class', 'Kathryn Janeway', 'Active (returned)'),
            new Starship(3, 'Deep Space Nine', 'Terok Nor (Station)', 'Benjamin Sisko', 'Active'),
            new Starship(4, 'USS Discovery (NCC-1031)', 'Crossfield-class', 'Michael Burnham', 'Active (32nd Century)')
        ];

        return $this->json($starships);
    }
}