<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/jve.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Stores</title>
  </head>
  <body>
    <?php
    include ('header.php');
    ?>
    <div class="content stores">
      <div class="title">Stores</div>
      <hr />
      <div class="store-branch">
        <p class="branch-name">Orchard Store</p>
        <p class="branch-loc">
          Location details 121232 <br />
          Tel: +65 2342 1234 <br />
          Opening Hours: 9am - 11pm <br />
          (Mon - Fri) 10am - 11pm (Sat - Sun)
        </p>
        <img src="img/stores-orchard-branch.jpg" alt="Orchard Store" />
      </div>
      <div class="store-branch">
        <p class="branch-name">Jurong East Store</p>
        <p class="branch-loc">
          Location details 121232 <br />
          Tel: +65 2342 1234 <br />
          Opening Hours: 9am - 11pm <br />
          (Mon - Fri) 10am - 11pm (Sat - Sun)
        </p>
        <img src="img/stores-jurong-branch.png" alt="Orchard Store" />
      </div>
    </div>
    <?php
    include ('footer.php');
    ?>
  </body>
</html>
