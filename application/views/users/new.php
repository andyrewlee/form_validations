<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form Validation Level 1</title>
    <!-- make sure you include jquery before validations.js -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="/assets/javascripts/validations.js"></script>
    <link href="/assets/stylesheets/style.css" rel="stylesheet">
  </head>
  <body>
<?php
    $this->load->view('partials/flash_messages.php');
?>
    <h1>Registration</h1>
    <form action="/users/create" method="post">
      <p>
        <label for="first_name">First Name:</label>
        <input id="first_name" name="first_name" type="text">
      </p>
      <p>
        <label for="last_name">Last Name:</label>
        <input id="last_name" name="last_name" type="text">
      </p>
      <p>
        <label for="email">Email:</label>
        <input id="email" name="email" type="email">
      </p>
      <p>
        <label for="password">Password:</label>
        <input id="password" name="password" type="password">
      </p>
      <p>
        <label for="password_confirmation">Password Confirmation:</label>
        <input id="password_confirmation"
               name="password_confirmation"
               type="password">
      </p>
      <input type="submit" value="Register">
    </form>
  </body>
</html>
