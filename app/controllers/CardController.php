<?php

namespace App\Controllers;

use Core\Controller;
use GuzzleHttp\Client;


class CardController extends Controller
{

    public function index($page = 1)
    {
        // Nombre d'éléments par page
        $perPage = 8;
        // Calcul de l'offset en fonction de la page demandée
        $offset = ($page - 1) * $perPage;

        // Créer une instance de Guzzle HTTP Client
        $client = new Client();

        try {
            // Effectuer une requête GET vers une API externe (YGOPRODeck)
            $response = $client->get('https://db.ygoprodeck.com/api/v7/cardinfo.php', [
                'query' => [
                    'num' => $perPage,
                    'offset' => $offset,
                    'format' => 'tcg',
                    'sort' => 'id',
                ],
            ]);

            // Traiter la réponse de l'API
            $cards = json_decode($response->getBody(), true);

            // Calculer le nombre total de pages en fonction du nombre total de cartes
            $totalCards = $cards['meta']['total_rows'];
            $totalPages = ceil($totalCards / $perPage);

            // Préparer les données à passer à la vue
            $data = [
                'title' => 'Les Cartes Yu-Gi-Oh!',
                'cards' => $cards['data'],
                'currentPage' => $page,
                'totalPages' => $totalPages,
            ];

            // Retourner les données à une vue ou effectuer d'autres traitements
            return $this->render('cards/index', $data);
        } catch (\Exception $e) {
            // Gérer les erreurs de requête
            echo "Erreur lors de la récupération des données : " . $e->getMessage();
        }
    }


    public function show($id)
    {
        $client = new Client();
        try {
            $response = $client->get('https://db.ygoprodeck.com/api/v7/cardinfo.php', [
                'query' => [
                    'id' => $id,
                ],
            ]);
            $card = json_decode($response->getBody(), true);
            if (empty($card['data'])) {
                echo "Carte non trouvée.";
                return;
            }
            $cardDetails = $card['data'][0];
            $data = [
                'title' => $cardDetails['name'],
                'card' => $cardDetails,
            ];
            return $this->render('cards/details/show', $data);
        } catch (\Exception $e) {
            echo "Erreur lors de la récupération des données : " . $e->getMessage();
        }
    }

}
