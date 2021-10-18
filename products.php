<?php
    include "dbconnect.php";
    $product_table_name = "test_product";
    $product_details_table_name = "test_details";
    $product_id = $_GET["id"];
    //echo var_dump($product_id);
    $query = "SELECT * from " .$product_table_name." WHERE product_id=".$product_id;
    //echo($query);
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;
    if ($num_results >0 )
    {
        $product_result = $result->fetch_assoc();
        var_dump($product_result);

    }
    $query = "SELECT * from " .$product_details_table_name." WHERE product_id=".$product_id;
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;
    //id to query will contain details_id to get the img link etc from products_img
    $id_to_query = array();
    
    for ($i=0; $i <$num_results; $i++) {
        $details_result = $result->fetch_assoc();
        $colours[$details_result['colour']] = $details_result['colour_code'];
    }
    var_dump($colours);

     $result->free();
     $dbcnx->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="jve.css">
    <title>Product Details</title>
    <style>
        /* Slideshow container */
        .slideshow-container {
            position: relative;
        }
        .slideshow{
            padding: 0 50px;
            width: 50%;
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
        }

        .price{
            font-size: 1.3rem;
            padding-top: 15px;
            font-weight: bold;
        }
        .quantity{
            padding: 30px 0; 
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
        

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
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
                <img class="jve-logo" alt="JVE Logo" src="img/JVE-logo.png">
            </a>
            <div class="header-products">
                <a href="">Smartphones</a>
                <a href="">Laptops</a>
                <a href="">Desktops</a>
                <a href="">Watches</a>
                <a href="">Earbuds</a>
            </div>
            <a href="">
                <img alt="shopcart" src="img/bag_icon.svg">
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
                    <div class="mySlides fade">
                    <img class="product-img" src="https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzkhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzkhxsp-483334092?$684_547_PNG$" style="width:100%">
                    </div>
                
                    <div class="mySlides fade">
                    <img class="product-img" src="https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzkhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzkhxsp-483334077?$684_547_PNG$" style="width:100%">
                    </div>
                
                    <div class="mySlides fade">
                    <img class="product-img" src="https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzkhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzkhxsp-483334078?$684_547_PNG$" style="width:100%">
                    </div>
                
                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
                <!-- The dots/circles -->
                <div style="text-align: center;">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
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
                    Color: <span class="colour-text">Black</span>
                </div>
                <div class="colour-picker-wrapper"> 
                    <span class="colour-circle selected" id="colour-0" style="background-color: black;"></span>
                    <span class="colour-circle" id="colour-1" style="background-color: blue;"></span>
                </div>
                <div class="quantity">
                    <button class="quantity-btn" onclick="decrease(this)"> - </button>
                    <input type="text" value="1" class="quantity-text">
                    <button class="quantity-btn" onclick="increase(this)"> + </button>
                </div>
                <button class="shopcart-btn"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" fill="white"/>
                    <path d="M12 1.5C12.9946 1.5 13.9484 1.89509 14.6517 2.59835C15.3549 3.30161 15.75 4.25544 15.75 5.25V6H8.25V5.25C8.25 4.25544 8.64509 3.30161 9.34835 2.59835C10.0516 1.89509 11.0054 1.5 12 1.5ZM17.25 6V5.25C17.25 3.85761 16.6969 2.52226 15.7123 1.53769C14.7277 0.553123 13.3924 0 12 0C10.6076 0 9.27226 0.553123 8.28769 1.53769C7.30312 2.52226 6.75 3.85761 6.75 5.25V6H1.5V21C1.5 21.7956 1.81607 22.5587 2.37868 23.1213C2.94129 23.6839 3.70435 24 4.5 24H19.5C20.2956 24 21.0587 23.6839 21.6213 23.1213C22.1839 22.5587 22.5 21.7956 22.5 21V6H17.25ZM3 7.5H21V21C21 21.3978 20.842 21.7794 20.5607 22.0607C20.2794 22.342 19.8978 22.5 19.5 22.5H4.5C4.10218 22.5 3.72064 22.342 3.43934 22.0607C3.15804 21.7794 3 21.3978 3 21V7.5Z" fill="#4D2E7A"/>
                    </svg>Add to cart</button>
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
    <script src="product.js"></script>
    <script>
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
        var imgColor = ["Black", "Blue"];
        // for showing different img based on the colour chosen
        var imgLinkDict = {
            0: [
            "https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzkhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzkhxsp-483334092?$684_547_PNG$",
            "https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzkhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzkhxsp-483334077?$684_547_PNG$",
            "https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzkhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzkhxsp-483334078?$684_547_PNG$"
            ], 
            1: [
                "https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzbhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzbhxsp-483334075?$684_547_PNG$",
                "https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzbhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzbhxsp-483334060?$684_547_PNG$",
                "https://images.samsung.com/is/image/samsung/p6pim/sg/sm-a127fzbhxsp/gallery/sg-galaxy-a12-a127-sm-a127fzbhxsp-483334061?$684_547_PNG$"

            ]
           
        };
         // for color picker
        var colours = document.getElementsByClassName("colour-circle");
        for(var i =0; i <colours.length; i++){
            colours[i].addEventListener("click", changeColour);
        }
        // toggle the selected style on the colour
        function changeColour(){
            document.getElementsByClassName("colour-circle selected")[0].classList.remove("selected");
            this.classList.add("selected");
            var numColour = Number(this.id[this.id.length-1]);
            var colourName = document.getElementsByClassName("colour-text")[0];
            colourName.innerHTML = imgColor[numColour];
            var productImg = document.getElementsByClassName("product-img");
            for (var i =0; i<productImg.length; i++){
                productImg[i].src = imgLinkDict[numColour][i];
            }
        }


    </script>
    
</body>
</html>