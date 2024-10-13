<?php
require 'vendor/autoload.php'; // Charger la bibliothèque Stripe

\Stripe\Stripe::setApiKey('YOUR_SECRET_KEY'); // Remplace par ta clé secrète

try {
    // Récupérer le token et le montant envoyés par le formulaire
    $input = json_decode(file_get_contents('php://input'), true);
    $token = $input['token'];
    $total = (float)$input['total'];

    // Créer le paiement
    $charge = \Stripe\Charge::create([
      'amount' => $total, // Montant en centimes
      'currency' => 'eur',
      'description' => 'Commande sur T-Shirt E-Shop',
      'source' => $token,
    ]);

    echo json_encode(['success' => true]);

} catch (\Stripe\Exception\ApiErrorException $e) {
    // Gérer les erreurs Stripe
    echo json_encode(['error' => $e->getMessage()]);
}
?>
