<?php session_start(); ?>
<!-- <body class="sub_page">

  <div class="hero_area">
    <?php include('header.php') ?>
  </div> -->

  <!-- Payment -->

    <section class="my-2 py-3 checkout">

        <div class="mx-auto container">
                    <div class="heading_container heading_center">
                    <h2>
                    Plata
                    </h2>
                </div>
                <div class="mx-auto container text-center">
                    <?php if(isset($_SESSION['order_id']) && $_SESSION['order_id'] != 0
                     && isset($_SESSION['total']) && $_SESSION['total'] != 0 ) { ?>

                              <?php $amount = strval($_SESSION['total']); ?>

                              <p>Total: <?php echo $_SESSION['total']; ?> lei</p>

                              <!-- Set up a container element for the button -->
                              <div id="paypal-button-container"></div>

                        <?php }else { ?>

                            <p>Nu aveti nocio comanda!</p>

                    <?php } ?>
                </div>
    </section>

  </section>

  <!-- end food section -->

 <!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
 <script src="https://www.paypal.com/sdk/js?&client-id=AZF2yryOD0euySXbJ2z9d-X55aZGVifqQs94vbNlQlB7zc-J1ysh36G1WOzL0mHqLQag0FimVvZ7jTEJ&currency=USD"></script>
<script>
  paypal.Buttons({

    // Sets up the transaction when a payment button is clicked
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $amount; ?>' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
          }
        }]
      });
    },

    // Finalize the transaction after payer approval
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            var transaction = orderData.purchase_units[0].payments.captures[0];
            alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            window.location.href = "complete_payment.php?transaction_id="+transaction.id;

        // When ready to go live, remove the alert and show a success message within this page. For example:
        // var element = document.getElementById('paypal-button-container');
        // element.innerHTML = '';
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        // Or go to another URL:  actions.redirect('thank_you.html');
      });
    }
  }).render('#paypal-button-container');

</script>

  <!-- footer section -->
 <?php include('footer.php') ?>