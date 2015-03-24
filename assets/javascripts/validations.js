function validateEmailOf($obj) {
  var regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regEx.test($obj.val());
}

function swapClass($obj, beforeClass, afterClass) {
  $obj.removeClass(beforeClass);
  $obj.addClass(afterClass);
}

function passwordsMatch() {
  return $('#password_confirmation').val() == $('#password').val();
}

function checkPasswords() {
  return passwordsMatch() ? true : false;
}

function hasPresence($obj) {
  return $obj.val() !== "" && $obj.val() !== null;
}

function validatePresenceOf($obj) {
  return hasPresence($obj) ? true : false;
}

function meetsLengthRequirements($obj, minLength) {
  return $obj.val().length > minLength;
}

function checkLengthOf($obj, minLength) {
  return meetsLengthRequirements($obj, minLength) ? true : false;
}

function fail($obj) {
  swapClass($obj, 'success', 'fail')
}

function success($obj) {
  swapClass($obj, 'fail', 'success')
}

$(document).ready(function() {
  $('#first_name, #last_name').keyup(function(){
    validatePresenceOf($(this)) ? success($(this)) : fail($(this));
  })

  $('#email').keyup(function(){
    validateEmailOf($(this)) ? success($(this)) : fail($(this));
  });

  $('#password').keyup(function(){
    checkLengthOf($(this), 7) ? success($(this)) : fail($(this));
  });

  $('#password_confirmation').keyup(function(){
    checkPasswords() ? success($(this)) : false($(this));
  });
});
