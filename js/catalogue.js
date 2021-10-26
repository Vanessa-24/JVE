var filters = document.querySelectorAll(".filter");

filters.forEach((filter) => {
  filter.addEventListener("click", function () {
    let selectedFilter = filter.getAttribute("data-filter");
    let itemsToHide = document.querySelectorAll(
      `.products .product:not([data-filter='${selectedFilter}'])`
    );
    let itemsToShow = document.querySelectorAll(
      `.products [data-filter='${selectedFilter}']`
    );

    if (selectedFilter == "all") {
      itemsToHide = [];
      itemsToShow = document.querySelectorAll(".products [data-filter]");
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
