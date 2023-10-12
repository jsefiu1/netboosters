<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<section id="content" class="box">
  <?php
  if (isset($_POST['add'])) {
    addService($_POST['service_name'],$_POST['service_description']);
  }
  ?>
  <div class="kontent">
    <form id="employer-form" method="POST">
      <div class="input-row">
        <label for="name">Service Name: </label>
        <input type="text" id="name" name="service_name" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <label for="description">Service Description: </label>
        <input type="text" id="description" name="service_description" required>
        <span class="error-message"></span>
      </div>
      <div class="input-row">
        <input type="submit" name="add" id="submit-button" value="Add">
      </div>
    </form>
  </div>