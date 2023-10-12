<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<section id="content" class="box">
  <?php
  if (isset($_POST['add'])) {
    addEmployer($_POST['name'],$_POST['surname'], $_POST['email'],
    $_POST['password'],  $_POST['experience'],$_POST['phone'], $_POST['roli']);
  }
  ?>
  <div class="kontent">
    <form id="employer-form" method="POST" class="box">
      <div class="input-row">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <label for="surname">Surname: </label>
        <input type="text" id="surname" name="surname" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <label for="email">Email: </label>
        <input type="text" id="email" name="email" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <label for="experience">Experience: </label>
        <input type="text" id="experience" name="experience" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <label for="phone">Phone: </label>
        <input type="text" id="phone" name="phone" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <label for="roli">Role: </label>
        <select name="roli" id="roli" required>
          <option class="error-message"></option>
          <option value="1">Admin</option>
          <option value="0">Employer</option>
        </select>
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
        <input type="submit" name="add" id="submit-button" value="Add">
      </div>
    </form>
  </div>