<?php
    include "dbconnect.php";
    $product_table_name = "test_product";
    $product_details_table_name = "test_details";
    $product_image_table_name = "test_img";
    $product_id = $_GET["id"];
    session_start();
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    // if (isset($_GET['buy'])) {
    //     $_SESSION['cart'][] = $_GET['buy'];
    //     var_dump($_SESSION['cart']);
    //     header('location: ' . $_SERVER['PHP_SELF']. '?' . SID);
    //     exit();
    // }
    //echo var_dump($product_id);
    $query = "SELECT * from " .$product_table_name." WHERE product_id=".$product_id;
    //echo($query);
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;
    if ($num_results >0 )
    {
        $product_result = $result->fetch_assoc();
        //var_dump($product_result);

    }
    $query = "SELECT * from " .$product_details_table_name." WHERE product_id=".$product_id;
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;
    //id to query will contain details_id to get the img link etc from products_img
    $id_to_query = array();
    //colours will be an indexed array that will hold the colour name, colour code and img link of the products
    // e.g [ ["colour_name", "colour_code", qty, [imglin1, imglink2] ] , ["colour_name", "colour_code", qty, [imglin1, imglink2] ] ]
    $colours = array();
    
    for ($i=0; $i <$num_results; $i++) {
        $details_result = $result->fetch_assoc();
        array_push($colours,array(ucwords($details_result['colour']), $details_result['colour_code'], $details_result['stock']));
        array_push($id_to_query,$details_result["details_id"]);
    }
    //var_dump($colours);
    //var_dump($id_to_query);
    for ($i=0; $i <count($id_to_query); $i++) {
        $query = "SELECT * from " .$product_image_table_name." WHERE details_id = ".$id_to_query[$i];
        //echo $query;
        $result = $dbcnx->query($query);
        $num_results = $result->num_rows;
        $img_links = array();
        for ($j=0; $j <$num_results; $j++) {
            $details_result = $result->fetch_assoc();
            array_push($img_links,$details_result['img_link']);
        }
        array_push($colours[$i],$img_links);
    }
    //echo "<br>";
    //var_dump($colours[0]);

    $result->free();
    $dbcnx->close();
    var_dump($_SESSION);
    // // remove all session variables
    // session_unset(); 

    // // destroy the session 
    // session_destroy(); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/jve.css">
    <link rel="stylesheet" href="css/product_shopcart.css">
    <title>Product Details</title>
    <style>
        /* Slideshow container */
        .slideshow-container {
            position: relative;
        }
        .slideshow{
            padding: 0 50px;
            flex:1 1 0;
        }
        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: black;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
            color: white;
        }

        .product-name{
            font-weight: bold;
            font-size: 1.6rem;
        }
        .product-description{
            /* same padding as slideshow */
            padding-right:50px;
            flex:1 1 0;
        }

        .price{
            font-size: 1.3rem;
            padding-top: 15px;
            font-weight: bold;
        }
        .quantity{
            padding: 30px 0 20px 0; 
        }
        .quantity-btn{
            background-color: transparent;
            border: transparent;
            font-size: 1.4rem;
        }
        .quantity-text{
            width: 50px;
            text-align: center;
            font-size: 1.1rem;
            margin: 0 10px;
        }
        .specifications{
            padding: 30px 0px;
        }
        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 10px;
            width: 10px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        .colour{
            padding-bottom: 10px;
        }
        
        .colour-picker-wrapper{
            padding-left: 5px;
        }
        .active, .dot:hover {
            background-color: #717171;
        }
    
        .details{
            padding-top: 20px;
        }
        .add-cart-msg{
            padding-left:20px;
            display:none;
        }

        /* .fade-out {
            animation: fadeOut 2s;
            opacity: 0;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        } */

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }
        .out-of-stock{
            color:red;
            padding-bottom:20px;
            font-weight:bold;
            font-size:1.2rem;
        }
        .shopcart-btn{
            background-color: transparent;
            color: #4D2E7A;
            border: 2px solid #4D2E7A; 
            border-radius: 15px;
            padding: 8px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-family: Roboto, Arial;
        }
        .shopcart-btn svg{
            padding-right: 10px;
            transform: scale(0.9);
        }
        .shopcart-btn:hover{
            background-color: #4D2E7A;
            color: white;
        }
        .shopcart-btn:hover svg path{
            fill: white;
        }
        .shopcart-btn:hover svg rect{
            fill: #4D2E7A;
        }
        /* disabled shopcart btn styling */
        .shopcart-btn:disabled,.shopcart-btn:disabled:hover {
            color: grey;
            border-color: grey;
            background-color:transparent;
        }
        .shopcart-btn:disabled:hover svg path,.shopcart-btn:disabled svg path{
            fill: grey;
        }
        .shopcart-wrapper{
            display:flex;
            align-items: center;
        }
        .wrapper{
            display: flex;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
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
            Product Details
        </div>
        <hr>
        <div class="wrapper">
            <!-- Slideshow container -->
            <div class="slideshow">
                <div class="slideshow-container">
                    <!-- Full-width images with number and caption text -->
                    <?php
                        for ($i=0; $i<count($colours[0][3]); $i++){
                            echo '<div class="mySlides fade">';
                            echo '<img class="product-img" src='.$colours[0][3][$i].' style="width:80%;display:block;margin:auto;">';
                            echo '</div>';
                        }
                    ?>
                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
                <!-- The dots/circles for slideshow -->
                <div style="text-align: center;">
                    <?php
                        for ($i=0; $i<count($colours[0][3]); $i++){
                            $j = $i +1;
                            echo '<span class="dot" onclick="currentSlide('.$j.')"></span>';
                        }
                    ?>
                </div>
            </div>
            <div class="product-description">
                <div class="product-name">
                    <?php echo $product_result['brand']." ".$product_result['product_model'];?>
                </div>
                <div class="price">
                    $<?php echo $product_result['price'];?>
                </div>
                <div class="details">
                    <?php echo $product_result['detail'];?>
                </div>
                <div class="specifications">
                    <?php echo str_replace(">","<br><br>",$product_result['specification']);?>
                </div>
                <div class="colour">
                    Color: <span class="colour-text"><?php echo $colours[0][0] ?></span>
                </div>
                <div class="colour-picker-wrapper"> 
                    <?php 
                        for ($i=0; $i <count($colours); $i++) {
                            if($i==0){
                                echo '<span class="colour-circle selected" id="colour-'.$i.'" style="background-color: '.$colours[$i][1].';"></span>';
                            } else {
                                echo '<span class="colour-circle" id="colour-'.$i.'" style="background-color: '.$colours[$i][1].';"></span>';

                            }
                        }
                    ?>
                </div>
                <div class="quantity">
                    <button class="quantity-btn" onclick="decrease(this)"> - </button>
                    <input type="text" value="1" class="quantity-text">
                    <button class="quantity-btn" id="increase-qty" data-maxqty= "<?php echo $colours[0][2];?>" onclick="increase(this)"> + </button>
                </div>
                <div class="out-of-stock" style="display:none">
                    OUT OF STOCK
                </div>
                <div class="shopcart-wrapper">
                    <button class="shopcart-btn" onclick="addToCart(); //this.onclick=null;"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 1.5625C13.536 1.5625 14.5296 1.97405 15.2621 2.70661C15.9947 3.43918 16.4062 4.43275 16.4062 5.46875V6.25H8.59375V5.46875C8.59375 4.43275 9.0053 3.43918 9.73786 2.70661C10.4704 1.97405 11.464 1.5625 12.5 1.5625ZM17.9688 6.25V5.46875C17.9688 4.01835 17.3926 2.62735 16.367 1.60176C15.3414 0.57617 13.9504 0 12.5 0C11.0496 0 9.6586 0.57617 8.63301 1.60176C7.60742 2.62735 7.03125 4.01835 7.03125 5.46875V6.25H1.5625V21.875C1.5625 22.7038 1.89174 23.4987 2.47779 24.0847C3.06384 24.6708 3.8587 25 4.6875 25H20.3125C21.1413 25 21.9362 24.6708 22.5222 24.0847C23.1083 23.4987 23.4375 22.7038 23.4375 21.875V6.25H17.9688ZM3.125 7.8125H21.875V21.875C21.875 22.2894 21.7104 22.6868 21.4174 22.9799C21.1243 23.2729 20.7269 23.4375 20.3125 23.4375H4.6875C4.2731 23.4375 3.87567 23.2729 3.58265 22.9799C3.28962 22.6868 3.125 22.2894 3.125 21.875V7.8125Z" fill="#4D2E7A"/>
                        </svg>Add to cart</button>
                        <span class="add-cart-msg"> Added! </span>
                </div>
            </div>

        </div>
       
    </div>
    <footer>
        <div class="footer-wrapper">
            <ul>
                <li class="footer-heading">Shop</li>
                <li><a href="">Smartphones</a></li>
                <li><a href="">Laptops</a></li>
                <li><a href="">Desktops</a></li>
                <li><a href="">Watches</a></li>
                <li><a href="">Earbuds</a></li>
            </ul>
            <ul>
                <li class="footer-heading">Support</li>
                <li><a href="">Contact Us</a></li>
                <li><a href="faq.html">FAQs</a></li>
            </ul>
            <ul>
                <li class="footer-heading">JVE</li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="">Stores</a></li>
            </ul>
            <div class="break"></div>
            <div class="copyright">
                Copyright © 2021 JVE Pte Ltd. All arights reserved  
            </div>
        </div>
    </footer>
    <script src="js/product.js"></script>
    <script>
        checkStock();
        //store php variale in javascript
        var productID = <?php echo json_encode($product_id, JSON_HEX_TAG); ?>;
        var coloursDetails = <?php echo json_encode($colours, JSON_HEX_TAG); ?>;
        var detailsID = <?php echo json_encode($id_to_query, JSON_HEX_TAG); ?>;
        console.log(coloursDetails);
        //numColourIDHtml will hold the id of the colour in html. so it starts from 0, it is used to get the detailsid for the post req
        var numColourIDHtml = 0;
        //for slideshow
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        // n is the index of the img to be shown, starting counting from 1
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            //hide all the imgs and active dots first
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            //show the correct img n dots highlighted, need minus one cus array start counting from 0 but we count from 1 .
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }   
        //Array that holds the name of the colours
        var imgColor = [];
        // dict that contains the img link for each colour, for showing different img based on the colour chosen
        var imgLinkDict = {};
        for (var i=0; i < coloursDetails.length; i++){
            imgColor.push(coloursDetails[i][0]);
            imgLinkDict[i] = coloursDetails[i][3];
        }
        console.log(imgColor);
        console.log(imgLinkDict);
        
         // for color picker
        var colours = document.getElementsByClassName("colour-circle");
        for(var i =0; i <colours.length; i++){
            colours[i].addEventListener("click", changeColour);
        }
        // toggle the selected style on the colour
        function changeColour(){
            document.getElementsByClassName("colour-circle selected")[0].classList.remove("selected");
            this.classList.add("selected");
            //get num colour to know which index to use for imgColor etc
            var numColour = Number(this.id[this.id.length-1]);
            numColourIDHtml = numColour;
            var colourName = document.getElementsByClassName("colour-text")[0];
            colourName.innerHTML = imgColor[numColour];
            var productImg = document.getElementsByClassName("product-img");
            //set the src link of the image
            for (var i =0; i<productImg.length; i++){
                productImg[i].src = imgLinkDict[numColour][i];
            }
            //set the stock amount for the colour chosen
            var qty_node = document.getElementById("increase-qty");
            qty_node.setAttribute("data-maxqty", coloursDetails[numColour][2]);
            var qty_text = document.getElementsByClassName("quantity-text")[0];
            //reset qty to 1
            qty_text.value = 1;
            checkStock();

        }

        function checkStock(){
            // this function will disable the qty btn n add to cart btn and display out of stock if stock =0.
            var stock = document.getElementById("increase-qty").dataset.maxqty;
            if(stock == 0) {
                document.getElementsByClassName("out-of-stock")[0].style.display = "block";
                var quantityBtn = document.getElementsByClassName("quantity-btn");
                for (var i =0; i<quantityBtn.length; i++){
                    quantityBtn[i].disabled = true;
                }
                document.getElementsByClassName("quantity-text")[0].disabled = true;
                document.getElementsByClassName("shopcart-btn")[0].disabled = true;
            } else {
                document.getElementsByClassName("out-of-stock")[0].style.display = "none";
                var quantityBtn = document.getElementsByClassName("quantity-btn");
                for (var i =0; i<quantityBtn.length; i++){
                    quantityBtn[i].disabled = false;
                }
                document.getElementsByClassName("quantity-text")[0].disabled = false;
                document.getElementsByClassName("shopcart-btn")[0].disabled = false;
            }
        }

        function addToCart(){
            var addCartMsg = document.getElementsByClassName("add-cart-msg")[0];
            var qty = document.getElementsByClassName("quantity-text")[0].value;
            addCartMsg.style.display="block";
            //addCartMsg.classList.add("fade-out");
            //need details_id and qty o be kept in session['cart']
            console.log(detailsID[numColourIDHtml]);
            //console.log(productID);
            console.log(qty);
            //var params = "product_id="+ productID +"&details_id="+detailsID[numColourIDHtml]+"&qty=" + qty;
            var params = "details_id="+detailsID[numColourIDHtml]+"&qty=" + qty;
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


    </script>
    
</body>
</html>