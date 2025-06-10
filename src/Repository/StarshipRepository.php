<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {

    }

    public function findAll(): array
    {
        $this->logger->info('Fetching starship collection');
        return [
            new Starship(1, 'USS Enterprise (NCC-1701-D)', 'Galaxy-class', 'Jean-Luc Picard', 'Active'),
            new Starship(2, 'USS Voyager (NCC-74656)', 'Intrepid-class', 'Kathryn Janeway', 'Active (returned)'),
            new Starship(3, 'Deep Space Nine', 'Terok Nor (Station)', 'Benjamin Sisko', 'Active'),
            new Starship(4, 'USS Discovery (NCC-1031)', 'Crossfield-class', 'Michael Burnham', 'Active (32nd Century)')
        ];
    }
}