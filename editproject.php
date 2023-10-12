<?php
include "inc/header.php";
?>

<link rel="stylesheet" href="static/css/form.css">

<?php
if(isset($_GET['pid'])) {
    $project = getProjectId($_GET['pid']);
    $projectid = $project['pid'];
    $name = $project['name'];
    $description = $project['description'];
    $start_date = $project['start_date'];
    $end_date = $project['end_date'];
    $serviceid = $project['sid'];
}

if(isset($_POST['save'])) {
    $editedProjectId = $_POST['pid'];
    $editedName = $_POST['name'];
    $editedDescription = $_POST['description'];
    $editedStartDate = $_POST['start_date'];
    $editedEndDate = $_POST['end_date'];
    $editedServiceId = $_POST['sid'];

    editProject($editedProjectId, $editedName, $editedDescription, $editedStartDate, $editedEndDate, $editedServiceId);
}
?>

<div class="kontent">
    <form id="project-form" method="POST" class="box">
        <input type="hidden" id="pid" name="pid" value="<?php echo !empty($projectid) ? $projectid : ''; ?>">

        <div class="input-row">
            <label>Project name:</label>
            <input type="text" id="name" name="name" value="<?php echo !empty($name) ? $name : ''; ?>">
            <span class="error-message"></span>
        </div>

        <div class="input-row">
            <label>Description:</label>
            <input type="text" id="description" name="description" value="<?php echo !empty($description) ? $description : ''; ?>">
            <span class="error-message"></span>
        </div>

        <div class="input-row">
            <label>Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="<?php echo !empty($start_date) ? $start_date : ''; ?>">
            <span class="error-message"></span>
        </div>

        <div class="input-row">
            <label>End Date:</label>
            <input type="date" id="end_date" name="end_date" value="<?php echo !empty($end_date) ? $end_date : ''; ?>">
            <span class="error-message"></span>
        </div>

        <div class="input-row">
            <label>Service:</label>
            <select name="sid" id="service" required>
                <option value="" disabled>Select a service</option>
                <?php
                $services = getServices();
                while ($service = mysqli_fetch_assoc($services)) {
                    $selected = ($service['sid'] == $serviceid) ? 'selected' : '';
                    echo "<option value='" . $service['sid'] . "' $selected>" . $service['service_name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-row">
            <input type="submit" name="save" id="submit-button" value="Save">
        </div>
    </form>
</div>
