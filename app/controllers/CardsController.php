<?php

namespace App\Controllers;

use App\Services\CardsService;
use App\Services\TwigService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CardsController
{
    private $cardService;
    private $twigService;


    public function __construct(CardsService $cardService, TwigService $twigService)
    {
        $this->cardService = $cardService;
        $this->twigService = $twigService;
    }

    public function index(Request $request)
    {
        $page = $request->query->getInt('page', 1);
        $num = $request->query->getInt('num', 8);

        try {
            $cards = $this->cardService->getCards($page, $num);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $data = [
            'title' => 'Le titre',
            'cards' => $cards['data'],
            'page' => $page,
            'num' => $num,
            'total' => $cards['meta']['total_rows']
        ];

        return $this->twigService->render('cards/index', $data);
    }

    public function show($id)
    {
        try {
            $card = $this->cardService->getCardDetails($id);

            if (empty($card['data'])) {
                echo "Carte non trouvée.";
                return;
            }

            $cardDetails = $card['data'][0];
            $data = [
                'title' => $cardDetails['name'],
                'card' => $cardDetails,
            ];

            return $this->twigService->render('cards/details/show', $data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function showArchetype($archetype, $page = 1)
    {
        $perPage = 8;
        $offset = ($page - 1) * $perPage;

        try {
            $cards = $this->cardService->getCardsByArchetype($archetype, $perPage, $offset);
            $totalCards = $cards['meta']['total_rows'];
            $totalPages = ceil($totalCards / $perPage);

            $data = [
                'title' => "Archétype : $archetype",
                'cards' => $cards['data'],
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'archetype' => $archetype,
            ];

            return $this->twigService->render('cards/details/showArchetype', $data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
