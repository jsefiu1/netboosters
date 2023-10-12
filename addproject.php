<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<?php
    if (isset($_POST['add'])) {
      addProject($_POST['name'],$_POST['description'], $_POST['start_date'],
      $_POST['end_date'],  $_POST['sid']);
    }
?>
    <div class="kontent">
    <form id="employer-form" method="POST" class="box">
            <div class="input-row">
            <label>Project name: </label>
                <input type="text" id="name" name="name">
                <span class="error-message"></span>
        </div>
        <div class="input-row">
                <label>Description: </label>
                <input type="text" id="description" name="description" required>
                <span class="error-message"></span>
            </div>
            <div class="input-row">
                <label>Start Date: </label>
                <input type="date" id="start_date" name="start_date" required>
                <span class="error-message"></span>
            </div>
            <div class="input-row">
                <label>end_date: </label>
                <input type="date" id="end_date" name="end_date" required>
                <span class="error-message"></span>
            </div>
            <div class="input-row">
            <label for="service">Service: </label>
            <select name="sid" id="service" required>
            <option class="error-message"></option>
            <?php
              $services = getServices(); 
              while ($service = mysqli_fetch_assoc($services)) {
                  echo "<option value='" . $service['sid'] . "'>" . $service['service_name'] . "</option>";
              }
              ?>
            </select>
            </div>
            <div class="input-row">
            <input type="submit" name="add" id="submit-button" value="Add">
        </div>
        </form>
    </div>