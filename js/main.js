  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    // document.getElementById('message').style.color = 'green';
    // document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('donmach').style.color = 'green';
    document.getElementById('donmach').innerHTML = 'The passwords do not match!!';
  }
}