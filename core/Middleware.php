<?php

namespace Core;

use App\Models\Managers\UserManager;

class Middleware
{
    public static function auth()
    {
        $userManager = new UserManager();
    }
    public static function getUsername()
    {
        $userManager = new UserManager();
        $userId = $_SESSION['user_id'] ?? null; // Récupère l'ID d'utilisateur depuis la session

        if ($userId) {
            $user = $userManager->getUserById($userId); // Récupère l'utilisateur par son ID
            return $user->getUsername(); // Retourne le nom d'utilisateur
        }

        return ''; // Retourne une chaîne vide si aucun utilisateur n'est connecté
    }
}
