<?php include("php/init.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/task3_style.css">
  <link rel="stylesheet" href="icomoon/style.css">
  <title>Pineapple!</title>

</head>

<body>

  <div class="mainContainer">
    <div class="baseContainer">

      <!-- Navigation bar section -->
      <div class="topBar">
        <div class="logoPineapple">
          <img class="desktopApple" src="css/images/pineapple.svg" alt="Top bar logo">
        </div>

        <div class="links">
          <a class="greyText" href="#">About</a>
          <a class="greyText" href="#">How it works</a>
          <a class="greyText" href="#">Contact</a>
        </div>
      </div>

      <div class="mobileImg">
        <div class="mobileField">

          <!-- Text section -->
          <div class="textContainer">
            <div class="heading">
              Subscribe to newsletter
            </div>

            <div class="subHeading greyText">
              <p>Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
            </div>
          </div>

          <!-- Inputs section -->
          <div class="inputContainer">

            <div class="blueStripe"></div>
            <form method="post">
              <div class="inputButton">

                <input class="emailInput greyText" type="text" placeholder="Type your email address here..." name="email" value="<?php if (isset($user->email)) echo $user->email;?>">
                <button class="btn icon-ic_arrow" type="submit" name="sub"></button>
              </div>

              <div class="checkBoxPosition">
                <label class="greyText checkbox">
                  <input id="box" type="checkbox" name="checkbox" <?php if (isset($checkbox)) echo "checked"; ?>>
                  <span class="mainSpan">I agree to <span><a class="service" href="#">terms of service</a></span></span>
                </label>
              </div>

            </form>
          </div>
          <div class="error" id="error"><?php echo $error; ?></div>

          <!-- Horizontal rule -->
          <hr>

          <!-- Social links section -->
          <div class="socialLinksContainer">
            <a class="wiki icon-ic_facebook" href="#"></a>
            <a class="wiki icon-ic-instagram" href="#"></a>
            <a class="wiki icon-ic_twitter" href="#"></a>
            <a class="wiki icon-ic-youtube" href="#"></span></a>
          </div>

        </div>
      </div>
    </div>

    <div class="imageContainer">
      <img src="css/images/summer.png" alt="Pineapple image">
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="js/input_validation.js" charset="utf-8"></script>
  <script type="text/javascript">
    // When page is loaded, submit button is disabled
    $(document).ready(function() {
      $('.btn').prop('disabled', true);
    });

    // Input validation function
    // Error messages are shown under input.
    // Once validation has passed, the errors disappears.
    $("form").on("input", function() {
      inputValidation();
    });

  </script>
</body>
</html>
