<?php
  include "dbconnect.php";
    $product_table_name = "products";
    $product_details_table_name = "product_details";
    $product_image_table_name = "product_images";
    session_start();
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }  
    $total_amount = $_GET['total'];
    //var_dump($_SESSION);
    $details_id = array();
    $qty = array();
    foreach ($_SESSION['cart'] as $key => $value) {
        array_push($details_id,$key);
        array_push($qty,$value);
    }
    // result details will have the first img, the model name, specs. colours, qty, price
    $result_details = array();
    $product_id = array();
    // get the product_id of the items in the shopcart
    for ($i=0; $i <count($details_id); $i++) {
        $query = "SELECT * from " .$product_details_table_name." WHERE details_ID=".$details_id[$i];
        $result = $dbcnx->query($query);
        $details_result = $result->fetch_assoc();
        array_push($product_id, $details_result["product_ID"]);
        $result_details[$i] = array();
        $result_details[$i]['colour_selected'] = $details_result["colour_code"];
        $result_details[$i]['colour_name_selected'] = $details_result["colour"];
    }

    // get the product model, details, specs and price of the items in the shopcart and also all the colours available where stock > 0
    for ($i=0; $i <count($product_id); $i++) {
        $query = "SELECT * from " .$product_table_name." WHERE product_ID=".$product_id[$i];
        $result = $dbcnx->query($query);
        $product_result = $result->fetch_assoc();
        $result_details[$i]['product_model'] = $product_result["product_model"];
        $result_details[$i]['price'] = $product_result["price"];

        $query = "SELECT * from " .$product_image_table_name." WHERE details_ID=".$details_id[$i];
        $result = $dbcnx->query($query);
        $img_result = $result->fetch_assoc();
        $result_details[$i]['img_link'] = $img_result['img_link'];
    }

    //var_dump($result_details);
    //var_dump($product_id);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/jve.css" />
    <link rel="stylesheet" href="css/checkout.css" />
    <title>Checkout</title>
  </head>
  <body>
    <?php
    include ('header.php');
    ?>
    <div class="content">
      <div class="title">Checkout</div>
      <hr />
      <div class="checkout-details row">
        <!-- Customer Details -->
        <div class="cust-details">
          <p class="note">*Required fields</p>
          <h4>Personal Details</h4>
          <form
            action="order_handler.php"
            id="customer-form"
            method="post"
            onsubmit="checkForm()"
          >
            <!-- Name -->
            <p>Name<span>*</span>:</p>
            <div class="flex-row">
              <div class="col first-name flex-row">
                <input
                  type="text"
                  id="first-name"
                  name="firstname"
                  placeholder="First Name"
                  required
                />
              </div>
              <div class="col last-name flex-row">
                <input
                  type="text"
                  id="last-name"
                  name="lastname"
                  placeholder="Last Name"
                  required
                />
              </div>
            </div>
            <!-- Email address -->
            <div id="email-add">
              <p>Email<span>*</span>:</p>
              <input
                type="email"
                id="your-email"
                name="email"
                placeholder="Email Address"
                required
              />
            </div>
            <!-- Phone number -->
            <div id="#phone-num">
              <p>Phone number:</p>
              <input
                type="text"
                id="your-number"
                name="phone-no"
                placeholder="Phone number"
              />
            </div>
            <!-- Address -->
            <p>Address<span>*</span>:</p>
            <div id="address" class="flex-row">
              <input
                type="text"
                id="your-address"
                name="address"
                placeholder="Address"
                required
              />
            </div>
            <!-- Payment -->
            <div>
              <h4>Payment:</h4>
              <img
                id="payment-img"
                src="img/credit-payment.png"
                alt="Modes of credit payment"
              />
            </div>
            <!-- Card details input -->
            <div class="flex-row">
              <div class="col card-input">
                <p>Card Number<span>*</span>:</p>
                <input
                  type="text"
                  id="your-card-no"
                  name="card-no"
                  placeholder="Card Number"
                  required
                />
              </div>
              <div class="col cvv-input">
                <p>CVV<span>*</span>:</p>
                <input
                  type="text"
                  id="your-cvv"
                  name="cvv-no"
                  placeholder="CVV"
                  required
                />
              </div>
            </div>

            <div class="buttons-row flex-row">
                <button
                  type="submit"
                  form="customer-form"
                  name="submit"
                  value="submit"
                  class="btn submit-btn"
                >
                  Submit
                </button>
              <button
                type="reset"
                name="clear"
                value="Clear"
                class="btn clear-btn"
              >
                Clear
              </button>
            </div>
          </form>
        </div>
        <!-- Order Summary -->
        <div class="order-summary">
          <h4 class="order-label">Order Summary</h4>
          <?php 
            for($i=0; $i < count($result_details); $i++){
              echo '<div class="row">';
              echo '<div class="product-img">';
              echo '<img src="'.$result_details[$i]['img_link'].'" alt="Product Image"/>';
              echo '</div>';
              echo '<div class="product-details">';
              echo '<p class="model">'.$result_details[$i]['product_model'].'</p>';
              echo '<div class="colour">';
              echo '<span class="colour-text">Colour:</span>';
              echo '<span class="colour-wrapper" style="background-color: '.$result_details[$i]['colour_selected'].'">';
              echo '</span>';
              echo '</div>';
              echo '<div class="order-qty">Quantity: '.$qty[$i].'';
              echo '</div>';
              echo '</div>';
              echo '<div class="product-price">';
              echo '<p class="price">$'.$result_details[$i]['price'].'</p>';
              echo '</div>';
              echo '</div>';
            }
          ?>
          <div class="total row">
            <div>
              <h4>Total:</h4>
            </div>
            <div>
              <h4 class="total-amt">$ <?php echo $total_amount;?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include ('footer.php');
    ?>
  </body>
</html>
