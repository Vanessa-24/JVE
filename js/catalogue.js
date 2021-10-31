// Default product count
var numDisplayedproducts = document.querySelectorAll(".grid-item").length;
var productCount = document.querySelector(".product-count");
productCount.innerHTML = numDisplayedproducts + " products";

//  Filter JS
var filters = document.querySelectorAll(".filter");

filters.forEach((filter) => {
  filter.addEventListener("click", function () {
    let selectedFilter = filter.getAttribute("data-filter");
    let itemsToHide = document.querySelectorAll(
      `.container .grid-item:not([data-filter='${selectedFilter}'])`
    );
    let itemsToShow = document.querySelectorAll(
      `.container [data-filter='${selectedFilter}']`
    );

    // Product count for filtered products
    numDisplayedproducts = itemsToShow.length;
    productCount.innerHTML = numDisplayedproducts + " products";
    
    if (selectedFilter == "all") {
      itemsToHide = [];
      itemsToShow = document.querySelectorAll(".container [data-filter]");
      
      // Product count for all products
      numDisplayedproducts = itemsToShow.length;
      productCount.innerHTML = numDisplayedproducts + " products";
    }
    
    if(numDisplayedproducts ==0){
      document.getElementsByClassName("no-product")[0].style.display = "block";
    } else{
      document.getElementsByClassName("no-product")[0].style.display = "none";

    }
    itemsToHide.forEach((el) => {
      el.classList.add("hide");
      el.classList.remove("show");
    });

    itemsToShow.forEach((el) => {
      el.classList.remove("hide");
      el.classList.add("show");
    });
  });
});
