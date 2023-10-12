<?php
  include 'functions.php';

  $result = getEmployers();
  $employer = mysqli_fetch_assoc($result);
  $employerid = $employer['eid'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>NetBoosters</title> 
  <link rel="stylesheet" href="static/css/style.css">
  <link rel="stylesheet" href="static/css/jquery-ui.css">
  <script src="static/js/jquery-3.6.0.js"></script>
  <script src="static/js/jquery.validate.min.js"></script>
</head>
<body>
  <header>
    <div class="container">
      <div class="header-content">
      <div class="logo">
        <a href="index.php">net boosters</a>
      </div>
      <div class="navbar">
    <ul class="nav-items">
      <li><a href='index.php'>Home</a></li>
      <li><a href='projects.php'>Projects</a></li>
      <li><a href='services.php'>Services</a></li>
      <?php
    
          if(isset($_SESSION['employer'])) {
            echo "<li class='dropdown'>";
            echo "<a  style='color: #3498db' href='index.php'>". $_SESSION['employer']['namesurname'] ."</a>";
            echo "<div class='dropdown-content'>";
            echo "<a href='profile.php?eid=$employerid'>Profile</a>";
            if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") {
            echo "<a href='messages.php'>Messages</a>";
            }
          
          echo "<a href='logout.php'>Logout</a>";
          echo "</div>";
          echo "</li>";
        }

        if (!isset($_SESSION['employer'])) {
          echo "<li><a href='login.php'>Login</a></li>";
        }
      ?> 
    </ul>  
  </div>
    </div> 
      
  </header>  

  <script>
$(document).ready(function() {
    $('#employer-form').validate({
      errorPlacement: function(error, element) {
      error.appendTo(element.next(".error-message"));
    },
        rules: {
            name: 'required',
            surname: 'required',
            email: {
                required: true,
                email: true
            },
            password: 'required',
            experience: 'required',
            phone: 'required',
            roli: 'required',
            project: 'required'
        },
        messages: {
            name: 'Please enter a name',
            surname: 'Please enter a surname',
            email: {
                required: 'Please enter an email address',
                email: 'Please enter a valid email address'
            },
            password: 'Please enter a password',
            experience: 'Please enter experience',
            phone: 'Please enter a phone number',
            roli: 'Please select a role',
            project: 'Please select a project'
        }
    });
});
</script>

<style>
  .kontent .input-row .error-message {
  color: red;
  font-size: 14px;
  margin-top: 5px;
}

.kontent .input-row input.error,
.kontent .input-row select.error {
  border-color: red;
}
</style>