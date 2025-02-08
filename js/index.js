function onSubmit(token) {
  var formData = new FormData(document.getElementById('login-form'));
  formData.append('g-recaptcha-token', token);

  fetch('/login', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      //Captcha passed
    } else {
      //Captcha failed (error message)
    }
  })
  .catch(error => {
    console.error(error);
  });
}

// To see "personas kods", by pressing the eye
const togglePassword = document.querySelector('#togglepassword');
const password = document.querySelector('#personaskods');

togglePassword.addEventListener('click', function (e) {
const type = password.type === 'password' ? 'text' : 'password';
password.type = type;

this.classList.toggle('fa-eye');
this.classList.toggle('fa-eye-slash');
});
