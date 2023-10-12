<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup | NetBoosters</title>
<link rel="stylesheet" href="form.css">
<style>
    form legend {
    bottom: 1%;
  }
</style>
</head>
<body>
  <div class="parent-form">
  <?php
        if (isset($_POST['register'])) {
          register($_POST['name'], $_POST['surname'],$_POST['email'],$_POST['email'],$_POST['fjalekalimi']);
      }
        ?>
    <form action="">
        <legend>Sign Up</legend>
        <div class="input-box">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <label for="surname">Surname</label>
          <input type="text" id="surname" name="surname" placeholder="Enter your surname" required>
        </div>
        <div class="input-box">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter password" required>        
        </div>
        <input type="submit" id="register" value="register" name="register">
        <p>I am already a member? <a href="login.php">Login here</a></p>
      </form>
  </div>
</body>
</html>