<?php
    session_start();
    var_dump($_POST);
    var_dump($_SESSION);
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    //$_SESSION['cart'] will be an associative array with the key being details_id and the value is another associative array {product_id: product_id, qty:qty}
    //details id is used cus in case the user wanna add to shopcart again or smth so the value of qty will be over written
    // $temp_var["product_id"] = $_POST['product_id'];
    // $temp_var["qty"] = $_POST['qty'];
    $_SESSION['cart'][$_POST['details_id']] = $_POST['qty'];

    exit();
?>