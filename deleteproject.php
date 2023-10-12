<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<?php
    if(isset($_GET['pid'])){
        $project = getProjectId($_GET['pid']);
        $projectid = $project['pid'];
        $name = $project['name'];
        $description = $project['description'];
        $start_date = $project['start_date'];
        $end_date = $project['end_date'];
        $serviceid = $project['sid'];
    }
    
    if (isset($_POST['delete'])) {
        deleteProject($projectid);
        header("Location: projects.php");
        exit();
    }
    
?>
<div class="kontent">
    <form id="employer-form" method="POST" class="box">
        <input type="hidden" id="eid" name="eid" value="<?php if(!empty($employerid)) echo $employerid; ?>">
        <div class="input-row">
            <label>Name: </label>
            <input disabled type="text" id="name" name="name" value="<?php if(!empty($name)) echo $name; ?>">
        </div>
        <div class="input-row">
            <label>Description: </label>
            <input disabled type="text" id="description" name="description" value="<?php if(!empty($description)) echo $description; ?>">
        </div>
        <div class="input-row">
            <label>Start Date: </label>
            <input disabled type="email" id="start_date" name="start_date" value="<?php if(!empty($start_date)) echo $start_date; ?>">
        </div>
        <div class="input-row">
            <label>End Date: </label>
            <input disabled type="text" id="end_date" name="end_date"
            value="<?php if(!empty($end_date)) echo $end_date; ?>">
        </div>
        <div class="input-row">
            <input type="submit" name="delete" id="submit-button" value="Delete">
        </div>
    </form>
</div>
