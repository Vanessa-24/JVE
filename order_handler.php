<?php 
    session_start();
    if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
    }  

    // /***** Customer Details *****/
    // Getting variables from form
    $name = $_POST['firstname'] . ' ' . $_POST['lastname']; 
    $firstName = $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNum = $_POST['phone-no'];

    include "dbconnect.php";

    // INSERTING INTO CUSTOMERS TABLE //
    $query = "insert into customers (name, email, address, phone_no) values ('".$name."', '".$email."', '".$address."', '".$phoneNum."')";

    $result = $dbcnx->query($query);

    // Get primary key (cust_ID) of just inserted row
    $newCustid = $dbcnx->insert_id; 
    
    if ($result) {
        echo $dbcnx->affected_rows. " New record created successfully";
    } else {
        echo "Error has occured";
    }

    // INSERTING INTO ORDERS TABLE //
    // Retrieve total amount of order from checkout
    $totalAmt = $_SESSION['total'];
    $currentDate = date("Y-m-d"); 

    $query = "insert into orders (cust_ID, date, amount) values ('".$newCustid."', '".$currentDate."', '".$totalAmt."')";
    
    $result = $dbcnx->query($query);

    // Get primary key (order_ID) of just inserted row
    $newOrderid = $dbcnx->insert_id; 
    
    if ($result) {
    echo $dbcnx->affected_rows. " New record created successfully";
    } else {
    echo "Error has occured";
    }

    // INSERTING INTO ORDERS_ITEMS TABLE //
    // Setting up and retrieving product details array
    $product_table_name = "products";
    $product_details_table_name = "product_details";
    $product_image_table_name = "product_images";

    $details_id = array();
    $qty = array();
    foreach ($_SESSION['cart'] as $key => $value) {
        array_push($details_id,$key);
        array_push($qty,$value);
    }
    // Declare arrays
    $product_id = array();
    $colour = array();

    // Get the product_id and colour of the items in the shopcart
    for ($i=0; $i <count($details_id); $i++) {
        $query = "SELECT * from product_details WHERE details_ID=".$details_id[$i];
        $result = $dbcnx->query($query);
        $details_result = $result->fetch_assoc();
        array_push($product_id, $details_result["product_ID"]);
        array_push($colour, $details_result["colour"]);
    
        // Creating query statements and inserting into database orders_items
        $query = "insert into orders_items (order_ID, product_ID, colour, quantity, status) values ('".$newOrderid."', '".$product_id[$i]."', '".$colour[$i]."', '".$qty[$i]."', 'packing')";

        $result = $dbcnx->query($query);
    
        if ($result) {
        echo $dbcnx->affected_rows. " New record created successfully";
        } else {
        echo "Error has occured";
        }
    }
    
    //  End session 
    unset($_SESSION['cart']);
    unset($_SESSION['total']);
    session_destroy();

    /***** Mail Handler *****/
    // Get customer's personal details from checkout page
    $to = "f32ee@localhost"; // this is the admin's Email address
    $from = $email; // this is the sender's email address

    // TO SENDER - Header and Message
    $subject = "We have received your payment!";
    $message = "Hello " . $firstName . "!\n\n" . "Your payment has been verified. Your order number is " . $newOrderid . ".\n\n" . "Here is a copy of your invoice:\n" . "http://192.168.56.2/f32ee/webapp-design-project/invoice.php?orderid=" . $newOrderid;

    $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($to,$subject,$message,$headers, '-ff32ee@localhost');

    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    // Ref to invoice (This has to be at the very end)
     header("Location: invoice.php?orderid=".$newOrderid);

?>
