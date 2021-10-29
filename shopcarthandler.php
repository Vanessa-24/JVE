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
    if(isset($_POST['details_id'])){
        //for adding products into shopcart
        $_SESSION['cart'][$_POST['details_id']] = $_POST['qty'];
        ksort($_SESSION['cart']);
    } else if(isset($_POST['remove_detailsID'])){
        //for removing items in shopcart
        unset($_SESSION['cart'][$_POST['remove_detailsID']]);
    } else if(isset($_POST['detailsID'])){
        //for updating for shopcart page
        if(isset($_POST['prevDetailsID'])){
            //need to remove prev details id and update with a new one
            unset($_SESSION['cart'][$_POST['prevDetailsID']]);
            $_SESSION['cart'][$_POST['detailsID']] = $_POST['qty'];
        }else{
            //just to update the qty
            $_SESSION['cart'][$_POST['detailsID']] = $_POST['qty'];
        }
        ksort($_SESSION['cart']);
    }

    exit();
?>