<?php

session_start();

//Folosind requestul de POST verificam daca userul a apasat pe butonul de adauga in cos
if(isset($_POST['add_to_cart'])) {

  //verifica daca exista cel putin un produs in cos
if(isset($_SESSION['cart'])) { // va stoca produsele din cos intr-un array

  //aray cu id-ul produselor adaugate
 $products_array_ids = array_column($_SESSION['cart'], "product_id");

 //verifica daca produsele au fost adaugate in cos sau nu
 if(!in_array($_POST['product_id'], $products_array_ids)) {
    //adauga produsul in cos
    $product_id = $_POST['product_id'];

    $product_array = array('product_id' => $product_id,
                          'product_name' => $_POST['product_name'],
                          'product_price' => $_POST['product_price'],
                          'product_image' => $_POST['product_image'],
                          'product_special_offer' => $_POST['product_special_offer'],
                          'product_quantity' => $_POST['product_quantity']
    );

    $_SESSION['cart'][$product_id] = $product_array;
    calculateTotalCart();
 } else {
     echo "<script>alert('Produsul a fost deja adaugat')</script>";
 }

 //verifica daca userul adauca pentru prima oara produse in cos
}else{
   //adauga produsul in cos
   $product_id = $_POST['product_id'];

   $product_array = array('product_id' => $product_id,
                         'product_name' => $_POST['product_name'],
                         'product_price' => $_POST['product_price'],
                         'product_image' => $_POST['product_image'],
                         'product_special_offer' => $_POST['product_special_offer'],
                         'product_quantity' => $_POST['product_quantity']
   );

   $_SESSION['cart'][$product_id] = $product_array; 
}


}else if(isset($_POST['remove_btn'])){

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //Calculam noul total
    calculateTotalCart();

}else if(isset($_POST['decrease_product_quantity_btn'])){

  //update cos decrease
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    //se preia produsul
    $product = $_SESSION['cart'][$product_id];

    //se acceseaza vechea cantitate a produsului si se rescrie cu cea noua
    $product['product_quantity'] = $product_quantity - 1;

    //daca cantitatea e 0 sau mai mica atunci se sterge produsul din cos
    if($product['product_quantity'] <= 0) {
      $product_id = $_POST['product_id'];
      unset($_SESSION['cart'][$product_id]);
    }else{
      $_SESSION['cart'][$product_id] = $product;
    }

    //Calculam noul total
    calculateTotalCart();

}else if(isset($_POST['increase_product_quantity_btn'])){
  //update cos adauga
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  //se preia produsul
  $product = $_SESSION['cart'][$product_id];

  //se acceseaza vechea cantitate a produsului si se rescrie cu cea noua
  $product['product_quantity'] = $product_quantity + 1;
  
    //daca cantitatea e 0 sau mai mica atunci se sterge produsul din cos
    if($product['product_quantity'] <= 0) {
      $product_id = $_POST['product_id'];
      unset($_SESSION['cart'][$product_id]);
    }else{
      $_SESSION['cart'][$product_id] = $product;
    }

  //Calculam noul total
  calculateTotalCart();
}

function calculateTotalCart () {

    $total_price = 0;
    $total_quantity = 0;
  
    foreach($_SESSION['cart'] as $id=>$product) {

      $product = $_SESSION['cart'][$id];
      $price =$product['product_price'];
      $quantity = $product['product_quantity'];

      $total_price = $total_price + ($price * $quantity);
      $total_quantity = $total_price + $quantity;

    }

    $_SESSION['total'] = $total_price;
    $_SESSION['quantity'] = $total_quantity;


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
          Comanda ta
        </h2>
      </div>

   


  <section class="cart container py-5">

    


    <div class="container">
      <!-- <h4>Your Order</h4> -->
    </div>




    <table class="pt-5">
      <tr>
        <th>Produse</th>
        <th>Cantitate</th>
        <th>Subtotal</th>
      </tr>


 
          <?php if(isset($_SESSION['cart'])){ ?>
          
          <!-- key este product_id cu el pargurgem arrayul in for
          value sunt datele produsului -->
          <?php foreach($_SESSION['cart'] as $key => $value) { ?>

                <tr>
                  <td>
                    <div class="product-info">
                      <img style="width: 100px; height: 75px" src="<?php echo 'assets/images/'.$value['product_image']; ?>">
                      <div>
                        <p><?php echo $value['product_name']; ?></p>
                        <small><span><?php echo $value['product_price']; ?></span>lei</small>
                        <br>
                        <form action="cart.php" method="POST">
                          <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">      
                          <input type="submit" name="remove_btn" class="remove-btn" value="sterge">
                        </form>
                      </div>
                    </div>
                  </td>

                  <td>
                    <form method="POST" acrion="cart.php">
                      <input type="submit" value="-" class="edit-btn " name="decrease_product_quantity_btn">

                      <input type="text" readonly name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
                      <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                      <input type="submit" value="+" class="edit-btn" name="increase_product_quantity_btn">
<!-- 
                      <input type="submit" value="-" class="edit-btn " name="decrease_product_quantity_btn">           
                      <input type="text" name="quantity" value="1" readonly="">
                      <input type="submit" value="+" class="edit-btn" name="increase_product_quantity_btn"> -->
                    </form>
                  </td>
                  <td>
                    <span class="product-price"><?php echo $value['product_price'] * $value['product_quantity']?></span>
                  </td>
                </tr>
      <?php } ?>

    <?php } ?>

    </table>


    <div class="cart-total">
      <table>
  
        <tr>
          <td>Total</td>
              <?php if(isset($_SESSION['cart'])){ ?>
               <td><?php echo "$".$_SESSION['total']; ?> lei</td>
              <?php } ?>
        </tr>
    
      
      </table>
    </div>
    

    <div class="checkout-container">
     
      <form method="GET" action="checkout.php">
        <input type="submit" class="btn checkout-btn" value="Finalizeaza comanda" name="checkout_btn">
      </form>
    
    
    
    </div>





  </section>

    </div>
  </section>

  <!-- end food section -->

  <!-- footer section -->
 <?php include('footer.php') ?>

