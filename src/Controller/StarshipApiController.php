<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;


class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection(LoggerInterface $logger, StarshipRepository $starshipRepository)
    {
        
        $starships = $starshipRepository->findAll();
        $logger->info('Starship collection fetched successfully', [
            'count' => count($starships)
        ]);

        return $this->json($starships);
    }
}