<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
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
            new Starship(1, 'USS Enterprise (NCC-1701-D)', 'Galaxy-class', 'Jean-Luc Picard', StarshipStatusEnum::IN_PROGRESS),
            new Starship(2, 'USS Voyager (NCC-74656)', 'Intrepid-class', 'Kathryn Janeway', StarshipStatusEnum::IN_PROGRESS),
            new Starship(3, 'Deep Space Nine', 'Terok Nor (Station)', 'Benjamin Sisko', StarshipStatusenum::WAITING),
            new Starship(4, 'USS Discovery (NCC-1031)', 'Crossfield-class', 'Michael Burnham', StarshipStatusEnum::COMPLETED)
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship)
        {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}