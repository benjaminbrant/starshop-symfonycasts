<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;

#[Route('/api/starships')] //Adds a global prefix route
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(LoggerInterface $logger, StarshipRepository $starshipRepository): Response
    {
        
        $starships = $starshipRepository->findAll();
        $logger->info('Starship collection fetched successfully', [
            'count' => count($starships)
        ]);

        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])] //Adds a regular expression whree id can only be int
    public function get(int $id, StarshipRepository $starshipRepository): Response
    {
        $starship = $starshipRepository->find($id);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starship);
    }
}