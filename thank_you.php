<?php session_start(); ?>

<!-- <body class="sub_page">

  <div class="hero_area">
  <?php include('header.php') ?>
  </div> -->

  <?php 
    
    if(isset($_SESSION['order_id']) && $_SESSION['order_id'] != 0
    && isset($_SESSION['total']) && $_SESSION['total'] != 0 ) {

        $order_id = $_SESSION['order_id'];
        $total = $_SESSION['total'];
        $products_bought = $_SESSION['cart'];

        //sterge tot din session
        session_unset();
        session_destroy();

    } else {
        header("location: index.php");
    }
  
  ?>
  <!-- Payment -->

    <section class="my-2 py-3 checkout">

        <div class="mx-auto container">
                <div class="mx-auto container text-center">
                    <?php if(isset($_GET['success_message'])) { ?>
                            <h3 style="color: blue;"><?php echo $_GET['success_message']; ?></h3>
                        <?php } ?>
                              <p><?php echo "Numar Comanda:". $order_id; ?></p>
                                <p><?php echo "Pastreaza numarul comenzii"; ?></p>
                                <p>Va vom livra comanda in cel mai scurt timp</p>

                </div>
    </section>

  </section>

  <!-- end food section -->
  <!-- footer section -->
 <?php include('footer.php') ?>