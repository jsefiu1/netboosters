<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<?php

    if(isset($_GET['eid'])){
        $employer=getEmployerId($_GET['eid']);
        $employerid=$employer['eid'];
        $name=$employer['name'];
        $surname=$employer['surname'];
        $email=$employer['email'];
        $password=$employer['password'];
        $experience=$employer['experience'];
        $phone=$employer['phone'];
        $project=$employer['pid'];
    }
    if (isset($_POST['save'])) {

        editEmployer($_POST['eid'],$_POST['name'],$_POST['surname'], $_POST['email'],
        $_POST['password'],  $_POST['experience'],$_POST['phone'], $_POST['pid']);
    }
?>
  <div class="kontent">
    <form id="employer-form" method="POST" class="box" action="/NetBoosters/index.php#contact-us">
        <input type="hidden" id="eid" name="eid" value="<?php if(!empty($employerid)) echo $employerid; ?>">
        <div class="input-row">
        <label>Name: </label>
        <input type="text" id="name" name="name" value="<?php if(!empty($name)) echo $name; ?>">
        <span class="error-message"></span>
    </div>
    <div class="input-row">
            <label>Surname: </label>
            <input type="text" id="surname" name="surname" value="<?php if(!empty($surname)) echo $surname; ?>">
            <span class="error-message"></span>
        </div>
        <div class="input-row">
            <label>Email: </label>
            <input type="text" id="email" name="email"
            value="<?php if(!empty($email)) echo $email; ?>">        
            <span class="error-message"></span>
        </div>
        <div class="input-row">
            <label>Password: </label>
            <input type="password" id="password" name="password"
            value="<?php if(!empty($password)) echo $password; ?>">
            <span class="error-message"></span>
        </div>
        <div class="input-row">
            <label>Experience: </label>
            <input type="text" id="experience" name="experience"
            value="<?php if(!empty($experience)) echo $experience; ?>">
            <span class="error-message"></span>
        </div>
        <div class="input-row">
            <label>Phone: </label>
            <input type="text" id="phone" name="phone"
            value="<?php if(!empty($phone)) echo $phone; ?>">
            <span class="error-message"></span>
        </div>
        <div class="input-row">
        <label for="project">Project: </label>
        <select name="project" id="project" required>
        <option class="error-message"></option>
        <?php
          $projects = getProjects(); 
          while ($project = mysqli_fetch_assoc($projects)) {
              echo "<option value='" . $project['pid'] . "'>" . $project['name'] . "</option>";
          }
          ?>
        </select>
      </div>
        <div class="input-row">
        <input type="submit" name="save" id="submit-button"  value="Save">
</div>
    </form>
</div>