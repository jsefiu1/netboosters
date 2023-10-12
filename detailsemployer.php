<?php

include 'inc/header.php';
?>
<style>
  /* The details page */
/* Style for the details container */
.details {
  margin: 20px auto;
  max-width: 600px;
  padding: 20px;
  border: 1px solid #ccc;
  background-color: #f5f5f5;
}

/* Style for form headings */
.details h1, .details h2 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

/* Style for labels */
.details label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

/* Style for input fields */
.details input[type="text"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff; 
  margin-bottom: 10px;
}

/* Style for the "Employer not found" message */
.details p {
  color: red;
}
</style>
<div class="details">
 <?php 

if (isset($_GET['eid'])) { 
  $employerid = $_GET['eid'];
  $employerDetails = getDetailsId($employerid);

  if ($employerDetails) { 
    echo "<form>";
    echo "<h1>Employer Details</h1>";
    echo "<label><strong>Employer Name:</strong></label>";
    echo "<input type='text' value='" . $employerDetails['employer_name'] . "' readonly><br>";

    echo "<h2>Project Details</h2>";
    echo "<label><strong>Working in the project:</strong></label>";
    echo "<input type='text' value='" . $employerDetails['project_name'] . "' readonly><br>";
    echo "<label><strong>Project Description:</strong></label>";
    echo "<input type='text' value='" . $employerDetails['project_description'] . "' readonly><br>";
    echo "<label><strong>Start Date:</strong></label>";
    echo "<input type='text' value='" . $employerDetails['start_date'] . "' readonly><br>";
    echo "<label><strong>End Date:</strong></label>";
    echo "<input type='text' value='" . $employerDetails['end_date'] . "' readonly><br>";

    echo "<h2>Service Details</h2>";
    echo "<label><strong>Service Name:</strong></label>";
    echo "<input type='text' value='" . $employerDetails['service_name'] . "' readonly><br>";
    echo "<label><strong>Service Description:</strong></label>";
    echo "<input type='text' value='" . $employerDetails['service_description'] . "' readonly><br>";

    echo "</form>";
  } else {
    echo "<p>No data for this employer</p>";
  }
} else {
  echo "<p>No employer ID provided.</p>";
}
?>

</div>

<?php include 'inc/footer.php' ?>