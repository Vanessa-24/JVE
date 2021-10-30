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
        $result_details[$i]['stock'] = $stock_arr;

    }
    
    
    //echo "<br>";
    //var_dump($details_id_shopcart);
    //echo "<br>";
    // var_dump($result_details);


    // var_dump($details_id);
    // var_dump($qty);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jve.css">
    <link rel="stylesheet" href="css/product_shopcart.css">
    <title>ShopCart</title>
    <style>
        .empty{
            text-align: center;
            padding-top:80px;
            font-size:1.2rem;
        }
        table{
            border-collapse: collapse;
        }
        #shopcart-table tr{
            border-bottom: 1px solid #848484;
        }
        #shopcart-table tr>td{
            padding-top: 30px;
        }
        #shopcart-table td:first-child{
            width: 15%;
            padding-bottom: 30px;
        }
        #shopcart-table td:nth-child(2){
            vertical-align: top;
            padding-left: 20px;
            width: 50%;
            padding-right: 80px;
            padding-bottom:50px;
        }
        .quantity-btn, .remove button{
            background-color: transparent;
            border: transparent;
            font-size: 1.4rem;
        }
        .quantity-text{
            width: 60px;
            text-align: center;
            font-size: 1.05rem;
            margin: 0 10px;
        }
        .remove svg{
            transform: scale(1.1);
        }
        .colour{
            padding-top: 50px;
        }
        .colour-circle{
            width: 12px;
            height: 12px;
        }
        .colour-picker-wrapper{
            padding-left: 5px;
        }
        .phone-model{
            font-size:1.2rem;
            padding-bottom: 10px;
            font-weight: bold;
        }
        .price{
            font-weight:bold;
        }
        .summary{
            padding-top:30px;
            width:fit-content;
            margin-left: auto;
            margin-right: 0;
        }
        #summary-table caption{
            text-align:left;
            font-weight:bold;
            padding-bottom: 10px;
            font-size:1.1rem;
        }
        #summary-table td{
            padding-top:10px;
        }
        #summary-table td:first-child{
            padding-right:40px;
        }
        #summary-table tr:nth-child(3)>td{
            padding-bottom: 10px;
        }
        #summary-table tr:last-child{
            border-top: 1px solid #ADADAD;
            font-weight:bold;
        }
        .shopcart-btn{
            margin-top:30px;
            width:100%;
        }
    </style>
</head>
<body>
    <?php
        include ('header.php');
    ?>
    <div class="content">
        <div class="title">
            Your Cart
        </div>
        <hr>
        <?php 
            if(count($_SESSION['cart']) ==0) {
                echo '<div class="empty"> You have not added anything to your cart. </div>';
            } 
        ?>
        <div>
            <table id="shopcart-table">
                <?php 
                    for($i=0; $i<count($result_details);$i++){
                        echo '<tr>';
                        // show the correct image based on the selected colour
                        echo '<td><img class="product-img" src="'.$result_details[$i]["img_link"][array_search($result_details[$i]["colour_selected"],$result_details[$i]["colours_code"])].'" style="width:100%"></td>';
                        echo '<td class="product-description">';
                        echo '<div>';
                        echo '<div class="phone-model">'.$result_details[$i]["product_model"].'</div>';
                        echo '<div class="specifications">'.$result_details[$i]["detail"].'</div>';
                        echo '<div class="colour">Colours: ';
                        echo '<span class="colour-picker-wrapper">';
                        for($j=0; $j<count($result_details[$i]["colours_code"]);$j++){
                            if($result_details[$i]["colour_selected"] != $result_details[$i]["colours_code"][$j]){
                                echo '<span class="colour-circle" id="colour-'.$j.'" style="background-color: '.$result_details[$i]["colours_code"][$j].';"></span>';
                            } else {
                                echo '<span class="colour-circle selected" id="colour-'.$j.'" style="background-color: '.$result_details[$i]["colour_selected"].';"></span>';
                            }
                        }
                        echo '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</td>';
                        echo '<td class="quantity">';
                        echo '<button class="quantity-btn" onclick="decrease(this);updatePrice(this);"> - </button>';
                        echo '<input type="text" value="'.$qty[$i].'" class="quantity-text">';
                        echo '<button class="quantity-btn increase-qty" data-maxqty= "'.$result_details[$i]['stock'][array_search($result_details[$i]["colour_selected"],$result_details[$i]["colours_code"])].'" onclick="increase(this);updatePrice(this);"> + </button>';
                        echo '</td>';
                        echo '<td class="price">';
                        echo '$ '.number_format((float)$qty[$i]*$result_details[$i]["price"],2, '.', '');
                        echo '</td>';
                        echo '<td class="remove">';
                        echo '<button onclick="remove()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
                        echo '<path d="M4.5 20.125C4.5 20.6223 4.69754 21.0992 5.04917 21.4508C5.4008 21.8025 5.87772 22 6.375 22H17.625C18.1223 22 18.5992 21.8025 18.9508 21.4508C19.3025 21.0992 19.5 20.6223 19.5 20.125V7H4.5V20.125ZM15.125 10.125C15.125 9.95924 15.1908 9.80027 15.3081 9.68306C15.4253 9.56585 15.5842 9.5 15.75 9.5C15.9158 9.5 16.0747 9.56585 16.1919 9.68306C16.3091 9.80027 16.375 9.95924 16.375 10.125V18.875C16.375 19.0408 16.3091 19.1997 16.1919 19.3169C16.0747 19.4342 15.9158 19.5 15.75 19.5C15.5842 19.5 15.4253 19.4342 15.3081 19.3169C15.1908 19.1997 15.125 19.0408 15.125 18.875V10.125ZM11.375 10.125C11.375 9.95924 11.4408 9.80027 11.5581 9.68306C11.6753 9.56585 11.8342 9.5 12 9.5C12.1658 9.5 12.3247 9.56585 12.4419 9.68306C12.5591 9.80027 12.625 9.95924 12.625 10.125V18.875C12.625 19.0408 12.5591 19.1997 12.4419 19.3169C12.3247 19.4342 12.1658 19.5 12 19.5C11.8342 19.5 11.6753 19.4342 11.5581 19.3169C11.4408 19.1997 11.375 19.0408 11.375 18.875V10.125ZM7.625 10.125C7.625 9.95924 7.69085 9.80027 7.80806 9.68306C7.92527 9.56585 8.08424 9.5 8.25 9.5C8.41576 9.5 8.57473 9.56585 8.69194 9.68306C8.80915 9.80027 8.875 9.95924 8.875 10.125V18.875C8.875 19.0408 8.80915 19.1997 8.69194 19.3169C8.57473 19.4342 8.41576 19.5 8.25 19.5C8.08424 19.5 7.92527 19.4342 7.80806 19.3169C7.69085 19.1997 7.625 19.0408 7.625 18.875V10.125ZM20.125 3.25001H15.4375L15.0703 2.51954C14.9925 2.36337 14.8727 2.23201 14.7243 2.14022C14.576 2.04844 14.4049 1.99988 14.2305 2.00001H9.76562C9.59155 1.99934 9.42081 2.04772 9.27297 2.1396C9.12512 2.23149 9.00615 2.36316 8.92969 2.51954L8.5625 3.25001H3.875C3.70924 3.25001 3.55027 3.31585 3.43306 3.43306C3.31585 3.55027 3.25 3.70925 3.25 3.87501V5.12501C3.25 5.29077 3.31585 5.44974 3.43306 5.56695C3.55027 5.68416 3.70924 5.75001 3.875 5.75001H20.125C20.2908 5.75001 20.4497 5.68416 20.5669 5.56695C20.6841 5.44974 20.75 5.29077 20.75 5.12501V3.87501C20.75 3.70925 20.6841 3.55027 20.5669 3.43306C20.4497 3.31585 20.2908 3.25001 20.125 3.25001Z" fill="black"/>';
                        echo '</svg></button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
              </table>
        </div>
                    
        <div class="summary">
        <?php 
            if(count($result_details)>0){

                echo '<table id="summary-table">';
                echo '<caption>Summary</caption>';
                echo '<tr>';
                echo '<td> Subtotal: </td>';
                echo '<td id="subtotal"></td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> GST: </td>';
                echo '<td id="gst"></td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Shopping fees: </td>';
                echo '<td id="shipping-fees"></td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td> Total: </td>';
                echo '<td id="total"></td>';
                echo '</tr>';
                echo '</table>';
                echo '<div>';
                echo '<button class="shopcart-btn" onclick="redirect()">';
                echo 'Checkout </button>';
                echo '</div>';
            }
        ?> 
        </div>
        
    </div>
    <?php
        include ('footer.php');
    ?>
    <script src="js/product.js"></script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        var panelHeight = 120;
        var resultDetails = <?php echo json_encode($result_details, JSON_HEX_TAG); ?>;
        var cartDetailsId = <?php echo json_encode($details_id, JSON_HEX_TAG); ?>;
        console.log(resultDetails);
        updateSummary();
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("active");

                /* Toggle between hiding and showing the active panel */
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight =  panelHeight + "px";
                }
            });
        }
          // for color picker
        var colours = document.getElementsByClassName("colour-circle");
        for(var i =0; i <colours.length; i++){
            colours[i].addEventListener("click", changeColour);
        }
        // toggle the selected style on the colour
        function changeColour(){
            //check if the colour selected already has a row by itself, if it does, dont change the colour since it is already there.
            var thisTRElement  = this.closest("tr");
            var this_selected_colour = this.style.backgroundColor;
            console.log(this.style.backgroundColor)
            var this_phonemodel = thisTRElement.getElementsByClassName("phone-model")[0].innerHTML;
            var phonemodel = document.getElementsByClassName("phone-model");
            for (i = 0; i < phonemodel.length; i++) {
                //if it is the same product, check if the colour is the same
                if(this_phonemodel == phonemodel[i].innerHTML){
                    if(this_selected_colour == phonemodel[i].parentNode.getElementsByClassName("colour-circle selected")[0].style.backgroundColor){
                        alert("The selected colour already exist in the shopcart!")
                        return
                    }
                }
            }
            //let the colour be selected, change the pic and the max-qty
            var prevId = this.parentNode.getElementsByClassName("colour-circle selected")[0].id;
            prevId = prevId[prevId.length-1];
            console.log(prevId)
            this.parentNode.getElementsByClassName("colour-circle selected")[0].classList.remove("selected");
            this.classList.add("selected");
            var numColour = Number(this.id[this.id.length-1]);
            //get the tr of interest
            var productImg = thisTRElement.getElementsByClassName("product-img");
            // set the new img link that correspond to the colour chosen
            productImg[0].src = resultDetails[thisTRElement.rowIndex]["img_link"][numColour];
            //set the stock amount for the colour chosen
            var qty_node = thisTRElement.getElementsByClassName("increase-qty")[0];
            qty_node.setAttribute("data-maxqty", resultDetails[thisTRElement.rowIndex]['stock'][numColour]);
            var qty_text = thisTRElement.getElementsByClassName("quantity-text")[0];
            // //reset qty to 1
            qty_text.value = 1;
            updateSessionVariable(false,resultDetails[thisTRElement.rowIndex]["details_id"][numColour],1,resultDetails[thisTRElement.rowIndex]["details_id"][prevId]);
            updatePrice(this);

        }

        // remove the whole <tr> of the row where the bin button is clicked.
        function remove(){
            var rowRemove = event.srcElement.closest("tr");
            // console.log(rowRemove.rowIndex);
            // console.log(cartDetailsId)
            // console.log(cartDetailsId[rowRemove.rowIndex]);
            //send req to php to remove the id from $_SESSION['cart']
            var params = "remove_detailsID="+cartDetailsId[rowRemove.rowIndex];
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() { //Call a function when the state changes.
                if(this.readyState === XMLHttpRequest.DONE && this.status === 200) { // complete and no errors
                    // Request finished. Do processing here.
                }
            };
            req.open("POST", 'shopcarthandler.php',true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send(params);
            cartDetailsId.splice(rowRemove.rowIndex, 1);
            resultDetails.splice(rowRemove.rowIndex, 1);
            //console.log(resultDetails)
            rowRemove.remove();
            updateSummary();
        }

        function updatePrice(el){
            var thisTRElement  = el.closest("tr");
            var price = thisTRElement.getElementsByClassName("price")[0];
            var qtyText = thisTRElement.getElementsByClassName("quantity-text")[0];
            var qty = qtyText.value; 
            var newPrice = Number(qty) * resultDetails[thisTRElement.rowIndex]["price"];
            price.innerHTML = "$ " + newPrice.toFixed(2);
            updateSummary();
            //update php session variable as well
            var numColour = thisTRElement.getElementsByClassName("colour-circle selected")[0].id;
            numColour = numColour[numColour.length-1];
            updateSessionVariable(true,resultDetails[thisTRElement.rowIndex]["details_id"][numColour],qty,null);
        }

        function updateSummary(){
            var subtotalElement = document.getElementById("subtotal");
            var gstElement = document.getElementById("gst");
            var shippingFeesElement = document.getElementById("shipping-fees");
            var totalElement = document.getElementById("total");
            var pricesElement = document.getElementsByClassName("price");
            var gstRate = 0.07;
            var shippingRate = 0.001;
            var subtotal = 0;
            for(var i = 0; i<pricesElement.length;i++){
                subtotal += Number(pricesElement[i].innerHTML.substring(1));
            }
            var gst = subtotal*gstRate;
            var shippingFees = subtotal*shippingRate;
            var total = subtotal + gst + shippingFees;
            subtotalElement.innerHTML = "$ " + subtotal.toFixed(2);
            gstElement.innerHTML = "$ " + gst.toFixed(2);
            shippingFeesElement.innerHTML = "$ " + shippingFees.toFixed(2);
            totalElement.innerHTML = "$ " + total.toFixed(2);
            

        }

        function updateSessionVariable(isQuantity,detailsID,qty,prevDetailsID){
            // if only quantity change then only need change the qty in session cart else need to remove the prev details id with the new one
            if(isQuantity){
                var params = "detailsID="+detailsID+"&qty="+qty;
            }else {
                var params = "prevDetailsID="+prevDetailsID+"&detailsID="+detailsID+"&qty="+qty;
            }
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() { //Call a function when the state changes.
                if(this.readyState === XMLHttpRequest.DONE && this.status === 200) { // complete and no errors
                    // Request finished. Do processing here.
                }
            };
            req.open("POST", 'shopcarthandler.php',true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send(params);

        }
        
        function redirect(){
            var totalElement = document.getElementById("total");
            var totalAmount = totalElement.innerHTML.substring(1);
            window.location.href = "checkout-page.php?total="+totalAmount;
        }

      </script>
    
</body>
</html>