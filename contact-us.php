<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/jve.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="js/contact-form.js"></script>
    <title>Contact Us</title>
  </head>
  <body>
    <?php
    include ('header.php');
    ?>
    <div class="content contact-us">
      <div class="title">Contact Us</div>
      <p>Question not answered yet? We love to help</p>
      <form
        action="mail_handler.php"
        id="contact-form"
        method="post"
        onsubmit="checkForm()"
      >
        <div>
          <input
            type="text"
            id="first-name"
            name="firstname"
            placeholder="First Name"
            oninput="validateFirstname()"
          />
          <div id="errorName" class="error-msg"></div>
        </div>
        <input
          type="text"
          id="last-name"
          name="lastname"
          placeholder="Last Name"
          oninput="validateLastname()"
        />
        <div id="errorLastname" class="error-msg"></div>
        <div>
          <input
            type="email"
            id="your-email"
            name="email"
            placeholder="Email Address"
            oninput="validateEmail()"
          />
          <div id="errorEmail" class="error-msg"></div>
        </div>
        <div>
          <textarea
            id="your-msg"
            name="message"
            rows="10"
            placeholder="Your Message..."
          ></textarea>
        </div>

        <button
          type="submit"
          form="contact-form"
          name="submit"
          value="Submit"
          class="submit-btn"
        >
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              class="msg-icon"
              d="M2.02712 9.70315C1.48337 9.5219 1.47816 9.22919 2.03753 9.04273L21.9198 2.41565C22.4709 2.23231 22.7865 2.54065 22.6323 3.08023L16.9511 22.9615C16.7948 23.5125 16.4771 23.5313 16.2438 23.0084L12.5 14.5834L18.75 6.25002L10.4167 12.5L2.02712 9.70315Z"
              fill="#5C1FB5"
            />
          </svg>

          SEND MESSAGE
        </button>
      </form>
    </div>
    <?php
    include ('footer.php');
    ?>
  </body>
</html>
