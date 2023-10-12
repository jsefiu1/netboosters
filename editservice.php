<?php
include "inc/header.php";
?>

<link rel="stylesheet" href="static/css/form.css">

<?php
if(isset($_GET['sid'])) {
    $service = getServiceId($_GET['sid']);
    $serviceid = $service['sid'];
    $name = $service['service_name'];
    $description = $service['service_description'];
}

if(isset($_POST['save'])) {
    editService($_POST['sid'], $_POST['service_name'], 
    $_POST['service_description']);
}
?>

<div class="kontent">
    <form id="project-form" method="POST" class="box">
        <input type="hidden" id="sid" name="sid" value="<?php echo !empty($serviceid) ? $serviceid : ''; ?>">

        <div class="input-row">
            <label>Project name:</label>
            <input type="text" id="name" name="service_name" value="<?php echo !empty($name) ? $name : ''; ?>">
            <span class="error-message"></span>
        </div>

        <div class="input-row">
            <label>Description:</label>
            <input type="text" id="description" name="service_description" value="<?php echo !empty($description) ? $description : ''; ?>">
            <span class="error-message"></span>
        </div>
        <div class="input-row">
            <input type="submit" name="save" id="submit-button" value="Save">
        </div>
    </form>
</div>
