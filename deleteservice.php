<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<?php
    if(isset($_GET['sid'])){
        $service = getServiceId($_GET['sid']);
        $serviceid = $service['sid'];
        $service_name = $service['service_name'];
        $service_description = $service['service_description'];
    }
    
    if (isset($_POST['delete'])) {
        deleteService($serviceid);
        header("Location: services.php");
        exit();
    }
    
?>
<div class="kontent">
    <form id="service-form" method="POST" class="box">
        <input type="hidden" id="sid" name="sid" value="<?php if(!empty($serviceid)) echo $serviceid; ?>">
        <div class="input-row">
            <label>Service Name: </label>
            <input disabled type="text" id="service_name" name="service_name" value="<?php if(!empty($service_name)) echo $service_name; ?>">
        </div>
        <div class="input-row">
            <label>Service Description: </label>
            <input disabled type="text" id="service_description" name="service_description" value="<?php if(!empty($service_description)) echo $service_description; ?>">
        </div>
        <div class="input-row">
            <input type="submit" name="delete" id="submit-button" value="Delete">
        </div>
    </form>
</div>
