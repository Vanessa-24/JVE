<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/jve.css" />
    <link rel="stylesheet" href="css/invoice.css" />
    <title>Invoice</title>
  </head>
  <body>
    <?php
    include ('header.php');
    ?>
    <div class="content">
      <div class="title">Invoice</div>
      <hr />
      <div class="row admin">
        <div class="to-customer">
          <p class="invoice-title">Invoice to:</p>
          <div class="customer-info">
            <p class="cust-name">Karen Yo</p>
            <p class="cust-address">
              Block 555 Jurong East Street 90 <br />#09-10 <br />
              Singapore 390423
            </p>
          </div>
        </div>
        <div class="admin-label">
          <p>Date:</p>
          <p>Order ID:</p>
        </div>
        <div class="details">
          <p id="date">20 Aug 2021</p>
          <p id="order-id">2312312</p>
        </div>
      </div>
      <div class="receipt">
        <!-- Table Header -->
        <div class="table-head row">
          <div class="header-item">No.</div>
          <div class="header-item">Description</div>
          <div class="header-item">Price</div>
          <div class="header-item">Qty</div>
          <div class="header-item">Total</div>
        </div>

        <!-- Product details -->
        <div class="item-details row">
          <div class="index">1.</div>
          <div class="description flex-row">
            <div class="product-img col-one-third">
              <img src="img/product-images/1-Samsung-Flip3.png" alt="" />
            </div>
            <div class="product-details col-two-third">
              <p class="product-model">Mobile Phone Model</p>

              <div class="colour">
                <span class="colour-text">Colour:</span>
                <span
                  class="colour-wrapper"
                  style="background-color: #e5dfc8"
                ></span>
              </div>
            </div>
          </div>
          <div class="price">$189.80</div>
          <div class="quantity">1</div>
          <div class="product-total">$189.80</div>
        </div>
        <div class="item-details row">
          <div class="index">2.</div>
          <div class="description flex-row">
            <div class="product-img col-one-third">
              <img src="img/product-images/1-Samsung-Flip3.png" alt="" />
            </div>
            <div class="product-details col-two-third">
              <p class="product-model">Mobile Phone Model</p>

              <div class="colour">
                <span class="colour-text">Colour:</span>
                <span
                  class="colour-wrapper"
                  style="background-color: #e5dfc8"
                ></span>
              </div>
            </div>
          </div>
          <div class="price">$189.80</div>
          <div class="quantity">1</div>
          <div class="product-total">$189.80</div>
        </div>
        <div class="table-footer"></div>
      </div>
      <div class="cost-table row">
        <div class="cost-label">
          <p>Subtotal:</p>
          <p>GST:</p>
          <p>Shopping fees:</p>
          <h4>Total:</h4>
        </div>
        <div class="calculation">
          <p id="subtotal">$ 379.80</p>
          <p id="gst">$ 12.82</p>
          <p id="fees">$ 6.36</p>
          <h4 id="total-amt">$ 410.80</h4>
        </div>
      </div>
    </div>
    <?php
    include ('footer.php');
    ?>
  </body>
</html>
