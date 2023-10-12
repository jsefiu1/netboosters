<?php
  include 'inc/functions.php';
?>
  <link rel="stylesheet" href="static/css/login.css">
  <script src="static/js/jquery-3.6.0.js"></script>
  <script src="static/js/jquery.validate.min.js"></script>
  <div class="parent-form">
      <?php
      if(isset($_SESSION['employer'])) {
        header("Location: index.php"); 
        exit();
    }
      if (isset($_POST['login'])) {
          login($_POST['email'], $_POST['password']);
      }
    ?>
    <form method="POST" id="login" action="">
        <legend>Login</legend>
        <div class="input-box">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
          <span class="error_message"></span>
        </div>
        <div class="input-box">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter password" required>  
          <span class="error_message"></span>
        </div>
        <input type="submit" id="login" name="login" value="Login">
      </form>
  </div>

<script>
  $(document).ready(function(){
    $('#login').validate({
      errorPlacement: function(error, element){
        error.appendTo(element.next(".error_message"));
      },
        rules : {
          email: {
              required: true,
              email: true
          },
          password: 'required',
        },
        messages: {
          email: {
              required: 'Please enter an email address',
              email: 'Please enter a valid email address'
          },
              password: 'Please enter a password'

        }
    });
  });
</script>