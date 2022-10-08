<?php

session_start();

if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  header('location: index.php');
}

?>

<!-- <body class="sub_page"> -->

  <!-- <div class="hero_area">
    <?php include('header.php') ?>
  </div> -->

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Detalii Plata
        </h2>
      </div>

   

       <!-- Checkout -->
    <section class="my-2 py-3 checkout">

        <div class="mx-auto container">
            <form id="checkout-form" action="place_order.php" method="POST">
                <div class="form-group checkout-small-element">
                    <label for="">Nume si Prenume</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="nume si prenume" required>
                </div>

                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="checkout-email" name="email" placeholder="email" required>
                </div>

                <div class="form-group checkout-small-element">
                    <label for="">Telefon</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="telefon" required>
                </div>

                <div class="form-group checkout-small-element">
                    <label for="">Oras</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="oras" required>
                </div>

                <div class="form-group checkout-large-element">
                    <label for="">Adresa</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="adresa" required>
                </div>



                <div class="form-group checkout-btn-container">
                    <p>Total: <?php echo $_SESSION['total']; ?> lei</p>
                    <input type="submit" class="btn" id="checkout-btn" name="checkout_btn" value="Finalizeaza Plata">
                </div>
   
            </form>
        </div>
    </section>






    </div>
  </section>

  <!-- end food section -->

  <!-- footer section -->
  <?php include('footer.php') ?>