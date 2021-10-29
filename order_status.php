<?php 
  include "dbconnect.php";
  $order_id = $_GET['order_id'];
  $order_items_table_name = "orders_items";
  $product_table_name = "products";
  $product_details_table_name = "product_details";
  $product_image_table_name = "product_images";
  $query = "SELECT * from " .$order_items_table_name." WHERE order_ID=".$order_id;
  $result = $dbcnx->query($query);
  $num_results = $result->num_rows;
  $ordered_items_result = array();
  //get ordered items details
  for ($i=0; $i <$num_results; $i++) {
    $order_items_result = $result->fetch_assoc();
    $ordered_items_result[$i]['product_id'] = $order_items_result['product_ID'];
    $ordered_items_result[$i]['colour'] = $order_items_result['colour'];
    $ordered_items_result[$i]['quantity'] = $order_items_result['quantity'];
    $ordered_items_result[$i]['status'] = $order_items_result['status'];
  }
  for($i=0; $i< count($ordered_items_result);$i++){
    $query = "SELECT * from " .$product_table_name." WHERE product_ID=".$ordered_items_result[$i]['product_id'];
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;
    //get product model name
    $product_result = $result->fetch_assoc();
    $ordered_items_result[$i]['model'] = $product_result['product_model'];
  }
  $details_id = array();
  //get details_id
  for($i=0; $i< count($ordered_items_result);$i++){
    $query = "SELECT * from " .$product_details_table_name." WHERE product_ID=".$ordered_items_result[$i]['product_id']. " AND colour= '".$ordered_items_result[$i]['colour']."'";
    $result = $dbcnx->query($query);
    //get product model name
    $product_details_result = $result->fetch_assoc();
    $details_id[$i]= $product_details_result['details_ID'];
    $ordered_items_result[$i]['colour_code'] = $product_details_result['colour_code'];
  }
  for($i=0; $i< count($details_id);$i++){
    $query = "SELECT * from " .$product_image_table_name." WHERE details_ID=".$details_id[$i];
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;
    //get product model name
    $details_result = $result->fetch_assoc();
    $ordered_items_result[$i]['img_link']= $details_result['img_link'];
  }

  //var_dump($ordered_items_result);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jve.css" />
    <link rel="stylesheet" href="css/product_shopcart.css">
    <title>Order Status</title>
    <style>
        .heading{
            padding-left:50px;
        }
        table {
            border-collapse: collapse;
            margin-top: 70px;
            margin-left: auto;
            margin-right:auto;
            width:90%;
        }
        tr{
            border-bottom: 1.5px solid #848484;
        }
        tr>td{
            padding-top: 30px;
        }
        tr:first-child{
          border-top: 1.5px solid #848484;
        }
        td:first-child{
            width: 15%;
            padding-bottom: 30px;
        }
        td:nth-child(2){
            vertical-align: top;
            padding-left: 20px;
            padding-bottom:50px;
        }
        .colour-circle{
            width: 12px;
            height: 12px;
        }
        .colour-picker-wrapper{
            padding-left: 10px;
        }
        .status{
          text-align:center;
          font-size:1.1rem;
        }
    </style>
</head>
<body>
    <header class="header">
        <nav>
          <a href="./">
            <img class="jve-logo" alt="JVE Logo" src="img/JVE-logo.png" />
          </a>
          <div class="header-products">
            <a href="product_catalogue.php?category=Smartphones">Smartphones</a>
            <a href="product_catalogue.php?category=Laptops">Laptops</a>
            <a href="product_catalogue.php?category=Desktops">Desktops</a>
            <a href="product_catalogue.php?category=Watches">Watches</a>
            <a href="product_catalogue.php?category=Earbuds">Earbuds</a>
          </div>
          <a href="shopcart.php">
            <img alt="shopcart" src="img/bag_icon.svg" />
          </a>
        </nav>
      </header>
      <div class="content">
        <div class="title">
            Order Status
        </div>
        <hr>
        <div class="wrapper">
            <div class="heading">Hello, the following are the status for your orders ( Order ID: <?php echo $order_id; ?> )</div>

            <div>
              <table id="shopcart-table">
                <?php 
                    for($i=0; $i<count($ordered_items_result);$i++){
                        echo '<tr>';
                        // show the correct image based on the selected colour
                        echo '<td><img class="product-img" src="'.$ordered_items_result[$i]["img_link"].'" style="width:100%"></td>';
                        echo '<td class="product-description">';
                        echo '<div>';
                        echo '<div class="phone-model">'.$ordered_items_result[$i]["model"].'</div>';
                        echo "<br>";
                        echo '<div class="colour">Colour: '.ucfirst($ordered_items_result[$i]["colour"]);
                        echo '<span class="colour-picker-wrapper">';
                        echo '<span class="colour-circle selected" style="background-color: '.$ordered_items_result[$i]["colour_code"].';"></span>';
                        echo '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</td>';
                        echo '<td class="quantity">';
                        echo '<div> Qty: '.$ordered_items_result[$i]['quantity'].'</div>';
                        echo '</td>';
                        echo '<td class="status">';
                        echo '<strong> Status: '.ucfirst($ordered_items_result[$i]["status"]).'</strong>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
              </table>
          </div>
        </div>
    </div>

    <footer>
        <div class="footer-wrapper">
          <ul>
            <li class="footer-heading">Shop</li>
            <li><a href="product_catalogue.php?category=Smartphones">Smartphones</a></li>
            <li><a href="product_catalogue.php?category=Laptops">Laptops</a></li>
            <li><a href="product_catalogue.php?category=Desktops">Desktops</a></li>
            <li><a href="product_catalogue.php?category=Watches">Watches</a></li>
            <li><a href="product_catalogue.php?category=Earbuds">Earbuds</a></li>
          </ul>
          <ul>
            <li class="footer-heading">Support</li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <li><a href="faq.html">FAQs</a></li>
          </ul>
          <ul>
            <li class="footer-heading">JVE</li>
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="stores.php">Stores</a></li>
          </ul>
          <div class="break"></div>
          <div class="copyright">
            Copyright © 2021 JVE Pte Ltd. All rights reserved
          </div>
        </div>
      </footer>
    
</body>
</html>