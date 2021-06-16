
function inputValidation() {

  var inputValue = $(".emailInput").val();
  var regex = /^[a-z0-9._-]+@([a-z0-9-]+\.)+[a-z]{2,6}$/i;
  var error = "";

  if (!regex.test(inputValue)) {
    error += "• Please provide a valid e-mail address.<br>";
  }

  if (!$("#box").is(":checked")) {
    error += "• You must accept the terms and conditions.<br>";
  }

  if ($(".emailInput").val() == "") {
    error += "• Email address is required.<br>";
  }

  if ($(".emailInput").val().match(/\.co$/)) {
    error += "• We are not accepting subscriptions from Colombia emails.<br>";
  }

  if (error != "") {
    $(".error").html('<div class="alert"><p><strong>There is an error(s) in your form:</strong></p>' + error + '</div>');
    $(".error").show();
    $('.btn').prop('disabled', true);
  } else {
    $(".error").hide();
    $('.btn').prop('disabled', false);
  }
}


function successMessageAppear() {
  $(".inputContainer").hide();
  $('.subHeading').text("You have successfully subscribed to our email listing. Check your email for the discount code.");
  $(".heading").addClass("newHeadingPos");
  $("hr").addClass("newHrPos");
  $('.heading').text("Thanks for subscribing!");
  $(".successLogo").removeClass("hide");
}
