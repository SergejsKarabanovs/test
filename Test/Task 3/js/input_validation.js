
function inputValidation() {

  var inputValue = $(".emailInput").val();
  //Define regular expression, for email validation
  var regex = /^[a-z0-9._-]+@([a-z0-9-]+\.)+[a-z]{2,6}$/i;
  //Empty variable to store all error messages
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
    $("#error").html('<div class="alert"><p><strong>There is an error(s) in your form:</strong></p>' + error + '</div>');
    $("#error").show();
    $('.btn').prop('disabled', true);
  } else {
    $("#error").hide();
    $('.btn').prop('disabled', false);
  }
}
