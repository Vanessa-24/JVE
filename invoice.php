<?php
    include "dbconnect.php";
    // Get order ID
    $orderID = $_GET["orderid"];

    // Get customer's details
    $query = "SELECT customers.name, customers.address, orders.amount, orders.date FROM customers, orders WHERE customers.cust_ID=orders.cust_ID AND orders.order_ID='$orderID'"; 

    // Query submission
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;

    for ($i=0; $i < $num_results; $i++) {
        $customer = $result->fetch_assoc();

        // Retrieve total amount of order
        $totalAmt = $customer['amount'];
        $subTotal = ($totalAmt/107.1) * 100;
        $gst = ($totalAmt/107.1) * 7;
        $shoppingFee = ($totalAmt/107.1) * 0.1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/jve.css" />
    <link rel="stylesheet" href="css/invoice.css" />
    <title>Invoice</title>
  </head>
  <body>
    <?php
    include ('header.php');
    ?>
    <div class="content">
      <div class="title">Invoice</div>
      <hr />
      <div class="row admin">
        <div class="to-customer">
          <p class="invoice-title">Invoice to:</p>
          <div class="customer-info">
            <p class="cust-name"><?php echo $customer['name']; ?></p>
            <p class="cust-address">
              <?php echo str_replace(",","<br>",$customer['address']); ?>
            </p>
          </div>
        </div>
        <div class="admin-label">
          <p>Date:</p>
          <p>Order ID:</p>
        </div>
        <div class="details">
          <p id="date">
            <?php 
            $date = date_create($customer['date']);
            echo date_format($date,"d F Y"); ?>
          </p>
          <p id="order-id"><?php echo $orderID; ?></p>
        </div>
      </div>
      <?php } 

      ?>
      <div class="receipt">
        <!-- Table Header -->
        <div class="table-head row">
          <div class="header-item">No.</div>
          <div class="header-item">Description</div>
          <div class="header-item">Price</div>
          <div class="header-item">Qty</div>
          <div class="header-item">Total</div>
        </div>

        <!-- Product details -->
        <div class="item-details row">
          <div class="index">1.</div>
          <div class="description flex-row">
            <div class="product-img col-one-third">
              <img src="img/product-images/1-Samsung-Flip3.png" alt="" />
            </div>
            <div class="product-details col-two-third">
              <p class="product-model">Mobile Phone Model</p>

              <div class="colour">
                <span class="colour-text">Colour:</span>
                <span
                  class="colour-wrapper"
                  style="background-color: #e5dfc8"
                ></span>
              </div>
            </div>
          </div>
          <div class="price">$189.80</div>
          <div class="quantity">1</div>
          <div class="product-total">$189.80</div>
        </div>
        <div class="item-details row">
          <div class="index">2.</div>
          <div class="description flex-row">
            <div class="product-img col-one-third">
              <img src="img/product-images/1-Samsung-Flip3.png" alt="" />
            </div>
            <div class="product-details col-two-third">
              <p class="product-model">Mobile Phone Model</p>

              <div class="colour">
                <span class="colour-text">Colour:</span>
                <span
                  class="colour-wrapper"
                  style="background-color: #e5dfc8"
                ></span>
              </div>
            </div>
          </div>
          <div class="price">$189.80</div>
          <div class="quantity">1</div>
          <div class="product-total">$189.80</div>
        </div>
        <div class="table-footer"></div>
      </div>
      <div class="cost-table row">
        <div class="cost-label">
          <p>Subtotal:</p>
          <p>GST:</p>
          <p>Shopping fees:</p>
          <h4>Total:</h4>
        </div>
        <div class="calculation">
          <p id="subtotal">$ <?php echo number_format($subTotal,2) ; ?></p>
          <p id="gst">$ <?php echo number_format($gst,2) ; ?></p>
          <p id="fees">$ <?php echo number_format($shoppingFee,2) ; ?></p>
          <h4 id="total-amt">$ <?php echo $totalAmt; ?></h4>
        </div>
      </div>
    </div>
    <?php
    include ('footer.php');
    ?>
  </body>
</html>
