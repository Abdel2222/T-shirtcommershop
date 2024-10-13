<?php
$total = $_GET['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paiement PayPal</title>
  <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script>
</head>
<body>
  <h1>Paiement avec PayPal</h1>
  
  <div id="paypal-button-container"></div>

  <script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $total; ?>' // Montant du panier total
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        alert('Transaction complétée par ' + details.payer.name.given_name);
        window.location.href = 'confirmation.php'; // Redirection après paiement
      });
    }
  }).render('#paypal-button-container');
  </script>
</body>
</html>
