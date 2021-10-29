<?php
  include "dbconnect.php";
    $product_table_name = "products";
    $product_details_table_name = "product_details";
    $product_image_table_name = "product_images";
    session_start();
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }  
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
    }

    // get the product model, details, specs and price of the items in the shopcart and also all the colours available where stock > 0
    for ($i=0; $i <count($product_id); $i++) {
        $query = "SELECT * from " .$product_table_name." WHERE product_ID=".$product_id[$i];
        $result = $dbcnx->query($query);
        $product_result = $result->fetch_assoc();
        $result_details[$i]['product_model'] = $product_result["product_model"];
        $result_details[$i]['detail'] = $product_result["detail"];
        $result_details[$i]['spec'] = $product_result["specification"];
        $result_details[$i]['price'] = $product_result["price"];
        $query = "SELECT * from " .$product_details_table_name." WHERE product_ID=".$product_id[$i]. " AND stock>0";
        $result = $dbcnx->query($query);
        $colour_codes = array();
        $stock_arr = array();
        //details id shopcart will contain the other colours as well bu details_id array only contain the id that the user has chose in the shopcart
        $details_id_shopcart = array();
        for($j=0; $j<$result->num_rows; $j++){
            $details_result = $result->fetch_assoc();
            array_push($stock_arr,$details_result['stock']);
            array_push($colour_codes, $details_result['colour_code']);
            array_push($details_id_shopcart,$details_result['details_ID']);
        }
        $result_details[$i]['details_id'] = $details_id_shopcart;
        $img_link = array();
        for ($j=0; $j <count($details_id_shopcart); $j++) {
            $query = "SELECT * from " .$product_image_table_name." WHERE details_ID=".$details_id_shopcart[$j];
            $result = $dbcnx->query($query);
            $details_result = $result->fetch_assoc();
            array_push($img_link,$details_result['img_link']);
            
        }
        $result_details[$i]['img_link'] = $img_link;
        $result_details[$i]['colours_code'] = $colour_codes;
    }
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
                  onclick="window.location.href = 'invoice.html';"
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
          <div class="row">
            <div class="product-img">
              <img
                src="img/product-images/2-Samsung-Fold3.png"
                alt="Product Image"
              />
            </div>
            <div class="product-details">
              <p class="model">Mobile Phone Model</p>
              <div class="colour">
                <span class="colour-text">Colour:</span>
                <span
                  class="colour-wrapper"
                  style="background-color: #2f2a27"
                ></span>
              </div>
            </div>
            <div class="product-price">
              <p class="price">$445.00</p>
            </div>
          </div>
          <div class="row">
            <div class="product-img">
              <img
                src="img/product-images/2-Samsung-Fold3.png"
                alt="Product Image"
              />
            </div>
            <div class="product-details">
              <p class="model">Mobile Phone Model</p>
              <div class="colour">
                <span class="colour-text">Colour:</span>
                <span
                  class="colour-wrapper"
                  style="background-color: #2f2a27"
                ></span>
              </div>
            </div>
            <div class="product-price">
              <p class="price">$445.00</p>
            </div>
          </div>
          <div class="total row">
            <div>
              <h4>Total:</h4>
            </div>
            <div>
              <h4 class="total-amt">$ 960.54</h4>
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
