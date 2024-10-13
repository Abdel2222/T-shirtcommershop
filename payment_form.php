<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paiement par carte</title>
  <script src="https://js.stripe.com/v3/"></script> <!-- Bibliothèque Stripe -->
</head>
<body>
  <h1>Paiement par carte bancaire (Visa/Mastercard)</h1>
  
  <form id="payment-form">
    <div id="card-element"><!-- Stripe va y insérer les champs pour la carte --></div>
    <button id="submit">Payer</button>
  </form>

  <script>
  var stripe = Stripe('YOUR_PUBLISHABLE_KEY'); // Remplace par ta clé publique
  var elements = stripe.elements();
  var card = elements.create('card');
  card.mount('#card-element');

  document.getElementById('payment-form').addEventListener('submit', function(event) {
      event.preventDefault();
      
      stripe.createToken(card).then(function(result) {
          if (result.error) {
              console.log(result.error.message); // Affiche une erreur s'il y en a
          } else {
              // Envoie le token au serveur pour traitement
              fetch('/process_payment.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({token: result.token.id, total: 2000}) // Montant total de la commande
              }).then(function(response) {
                  return response.json();
              }).then(function(responseJson) {
                  if (responseJson.success) {
                      alert('Paiement réussi !');
                      window.location.href = 'confirmation.php'; // Redirection après paiement
                  }
              });
          }
      });
  });
  </script>
</body>
</html>

