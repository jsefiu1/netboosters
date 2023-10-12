<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<?php

if (isset($_SESSION['employer']['eid'])) {
    $employerid = $_SESSION['employer']['eid']; 
    $employer = getEmployer($employerid); 
} else {
    header("Location: login.php");
    exit;
}

if(isset($_POST['saveChanges'])){
    profileEdit($_POST['name'], $_POST['surname'],  $_POST['email'],  $_POST['password']);
}
?>
<style>
    .error{
        color: red;
    }
    .success{
        color: green;
    }
</style>
<style>
  .feedback-message {
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
    margin-top: 10px;
    max-width: 300px;
  }

  .success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }

  .fail {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }
</style>

    <div class="kontent">
        <form id="employer-form" method="POST" class="box">
        <div class="input-row">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $employer['name']; ?>" >
            <span class="error-message"></span>
</div>  
<div class="input-row">

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" value="<?php echo $employer['surname']; ?>">
            <span class="error-message"></span>
            </div>  
            <div class="input-row">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $employer['email']; ?>">
            <span class="error-message"></span>
            </div>  
            <div class="input-row">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $employer['password']; ?>">
            <span class="error-message"></span>
            </div>  
            <div class="input-row">
            <input type="submit"  id="submit-button" name="saveChanges" value="Save Changes">
            </div>
        </form>
    </div>

