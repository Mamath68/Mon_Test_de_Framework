<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CardsService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCards(int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'id',
                    'format' => 'tcg'
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }

    public function getCardDetails(int $id): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'id' => $id,
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        $data = $response->toArray();
        return $data['data'][0];
    }

    public function getCardsByArchetype(string $archetype, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'archetype' => $archetype,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'id',
                    'format' => 'tcg'
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByMinAtk(int $page, int $num, int $minAtk = 0): array
    {
        $offset = ($page - 1) * $num;
        $response = $this->client->request('GET', 'https://db.ygoprodeck.com/api/v7/cardinfo.php', [
            'query' => [
                'atk' => ">{$minAtk}",
                'offset' => $offset,
                'num' => $num,
                'sort' => 'level',
            ]
        ]);

        $cards = $response->toArray();

        // Filter out magic and trap cards
        $filteredCards = array_filter($cards['data'], function ($card) {
            return $card['type'] !== 'Spell Card' && $card['type'] !== 'Trap Card' && $card['type'] !== 'Token';
        });

        return [
            'data' => array_values($filteredCards),
            'meta' => $cards['meta']
        ];
    }
    public function getCardsByMinDef(int $page, int $num, int $minDef = 0): array
    {
        $offset = ($page - 1) * $num;
        $response = $this->client->request('GET', 'https://db.ygoprodeck.com/api/v7/cardinfo.php', [
            'query' => [
                'def' => ">{$minDef}",
                'offset' => $offset,
                'num' => $num,
                'sort' => 'level',
            ]
        ]);

        $cards = $response->toArray();

        // Filter out magic and trap cards
        $filteredCards = array_filter($cards['data'], function ($card) {
            return $card['type'] !== 'Spell Card' && $card['type'] !== 'Trap Card' && $card['type'] !== 'Link Monster' && $card['type'] !== 'Token';
        });

        return [
            'data' => array_values($filteredCards),
            'meta' => $cards['meta']
        ];
    }
    public function getCardsByAtk(string $attack, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'atk' => $attack,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'level',
                    'format' => 'tcg'
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByDef(string $def, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'def' => $def,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'level',
                    'format' => 'tcg'
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByAttribute(string $attribute, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'attribute' => $attribute,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'level',
                    'format' => 'tcg',

                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByLevel(string $level, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'level' => $level,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'id',
                    'format' => 'tcg',

                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByScale(string $scale, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'scale' => $scale,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'level',
                    'format' => 'tcg',

                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByLink(string $linkval, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'link' => $linkval,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'id',
                    'format' => 'tcg',

                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByRace(string $race, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'race' => $race,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'level',
                    'format' => 'tcg',

                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByType(string $type, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'type' => $type,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'level',
                    'format' => 'tcg',

                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
    public function getCardsByRaceType(string $race, string $type, int $page = 1, int $num = 8): array
    {
        $response = $this->client->request(
            'GET',
            'https://db.ygoprodeck.com/api/v7/cardinfo.php',
            [
                'query' => [
                    'race' => $race,
                    'type' => $type,
                    'num' => $num,
                    'offset' => ($page - 1) * $num,
                    'sort' => 'id',
                    'format' => 'tcg',

                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Failed to fetch data from YGOPRODeck API');
        }

        return $response->toArray();
    }
}
