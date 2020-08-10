
$(document)
.on("submit", "form.js-register", function(event) {
  event.preventDefault();

  var _form = $(this);
  var _error = $(".js-error", _form);

  var data = {
    email: $("input[type='email']", _form).val(),
    password: $("input[type='password']", _form).val()
  };

  if(data.email.length < 6) {
    _error.text("Please enter a valid email address.").show();
    return false;
  } else if (data.password.length < 11) {
    _error.text("Please enter a passphrase that is at least 11 characters long.").show();
    return false;
  }
  //assuming the code gets this far, we can start the ajax process
  _error.hide();

  $.ajax({
    type: 'POST',
    url: 'php_login_system/ajax/register.php',
    data: data,
    dataType: 'json',
    async: true,
  })
  .done(function ajaxDone(data) {
    //Whatever data is
    console.log(data);
    if(data.redirect !== undefined) {
      window.location = data.redirect;
    }
    alert(data.name);
  })
  .fail(function ajaxFailed(e) {
    //This failed
    console.log(e);
  })
  .always(function ajaxAlwaysDoThis(data) {
    //always do
    console.log('Always');
  })




  return false;
})





//LETS ENCRYPT for https