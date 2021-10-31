<?php
    include "dbconnect.php";
    // Get category from header.php
    $product_category = $_GET["category"];

    // Select respective query command from category to load products
    switch ($product_category) {
      case "Smartphones":
        $query = "SELECT * from products WHERE category='Smartphones'"; 
        break;
      case "Laptops":
        $query = "SELECT * from products WHERE category='Laptops'"; 
        break;
      case "Desktops":
        $query = "SELECT * from products WHERE category='Desktops'"; 
        break;
      case "Watches":
        $query = "SELECT * from products WHERE category='Watches'"; 
        break;
      default:
        $query = "SELECT * from products WHERE category='Earbuds'"; 
    }

    // Query submission
    $result = $dbcnx->query($query);
    $num_results = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/jve.css" />
    <link rel="stylesheet" href="css/catalogue.css" />
    <title><?php echo $product_category; ?></title>
  </head>
  <body>
    <?php
    include ('header.php');
    ?>
    <div class="content">
      <div class="title">
        <?php echo $product_category; ?>
      </div>
      <hr />
      <div class="products-sort">
        <div class="dropdown">
          <button class="dropbtn">
            <span id="filter-icon">
              <svg
                width="25"
                height="21"
                viewBox="0 0 25 21"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M11.7668 20.8943H9.21053V10.3526L0 1.64664V0H25V1.63724L16.2281 10.3432V17.3521L11.7668 20.8943ZM10.9649 19.5013H11.0402L14.4737 16.7752V9.8546L22.9995 1.39295H2.02303L10.9649 9.8452V19.5013Z"
                  fill="#333333"
                />
              </svg>
            </span>
            Filter by brand
          </button>
          <div class="dropdown-content filters">
            <a class="filter" data-filter="all">ALL</a>
            <a class="filter" data-filter="Apple" href="#">Apple</a>
            <a class="filter" data-filter="Dell">Dell</a>
            <a class="filter" data-filter="HP">HP</a>
            <a class="filter" data-filter="HUAWEI" href="#">HUAWEI</a>
            <a class="filter" data-filter="Lenovo" href="#">Lenovo</a>
            <a class="filter" data-filter="Oppo">Oppo</a>
            <a class="filter" data-filter="Samsung" href="#">Samsung</a>
            <a class="filter" data-filter="Sony">Sony</a>
          </div>
        </div>
          <p class="product-count" >9 products</p>
      </div>
      <div class="container">
        <?php
             for ($i=0; $i < $num_results; $i++) {
                $product = $result->fetch_assoc();
        ?>
        <div class="grid-item" data-filter="<?php echo $product['brand']; ?>">
          <img
            class="product-image"
            src="<?php echo $product['image']; ?>"
            alt="<?php echo $product['product_model']; ?>"
          />
          <h6 class="product-model"><?php echo $product['product_model']; ?></h6>
          <p class="price">S$ <?php echo $product['price']; ?></p>
          <a class="learn-more-btn" href="products.php?id=<?php echo $product['product_ID']; ?>"
            >Learn More
            <span class="icon">
              <svg
                width="10"
                height="12"
                viewBox="0 0 18 20"
                fill="#none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  class="arrow-icon"
                  d="M13.9772 9.72452L1.32496 1.71235C1.2208 1.64778 1.13844 1.57113 1.08267 1.48682C1.0269 1.40251 0.998811 1.31222 1.00004 1.22118C1.00127 1.13013 1.03178 1.04015 1.08982 0.956419C1.14786 0.872692 1.23227 0.796889 1.33816 0.733396C1.44406 0.669903 1.56933 0.619981 1.70674 0.58652C1.84415 0.553059 1.99097 0.536722 2.13869 0.538455C2.28642 0.540188 2.43212 0.559957 2.56736 0.596617C2.7026 0.633277 2.82471 0.686101 2.9266 0.752031L16.3357 9.24436C16.5386 9.3729 16.6522 9.54517 16.6522 9.72452C16.6522 9.90386 16.5386 10.0761 16.3357 10.2047L2.9266 18.697C2.82471 18.7629 2.7026 18.8158 2.56736 18.8524C2.43212 18.8891 2.28642 18.9088 2.13869 18.9106C1.99097 18.9123 1.84415 18.896 1.70674 18.8625C1.56933 18.8291 1.44406 18.7791 1.33816 18.7156C1.23227 18.6521 1.14786 18.5763 1.08982 18.4926C1.03178 18.4089 1.00127 18.3189 1.00004 18.2279C0.998811 18.1368 1.0269 18.0465 1.08267 17.9622C1.13844 17.8779 1.2208 17.8013 1.32496 17.7367L13.9786 9.72452H13.9772Z"
                  fill="#4D2E7A"
                  stroke="#4D2E7A"
                />
              </svg>
            </span>
          </a>
        </div>
        <?php } ?>
        <div class="no-product">Sorry there isn't any product with this brand.</div>
      </div>
    </div>
    <?php
    include ('footer.php');
    ?>
    <script src="js/catalogue.js"></script>
  </body>
</html>
