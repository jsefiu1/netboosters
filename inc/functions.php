<?php
session_start();
$dbconn = "";
function dbConn(){
  global $dbconn;
  $dbconn = mysqli_connect("localhost",'root','', 'netboosters');
  if(!$dbconn){
    die("Deshtoi lidhja m DB" . mysqli_error($dbconn));
  }
}

dbConn();

function login($email, $password){
    global $dbconn;
    $sql = "SELECT eid,name,surname,email,password,experience,phone,roli FROM employers ";
    $sql .= " WHERE email='$email' AND password='$password'";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $employerData = mysqli_fetch_assoc($result);
        $employer = array();
        $employer['eid'] = $employerData['eid'];
        $employer['namesurname'] = $employerData['name'] . " " . $employerData['surname'];
        $employer['roli'] = $employerData['roli'];
        $_SESSION['employer']=$employer;
        header("Location: index.php");
    } else {
        echo "No employer found. Please try again.";
    }
}

function getEmployers(){
  global $dbconn;
  $sql = "SELECT eid, name, surname, email, password, experience, phone, roli FROM employers";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    return $result;
  }else{
    echo "No Data Found";
  }
}
function getEmployerId($employerid)
{
    global $dbconn;
    $sql = "SELECT * FROM employers WHERE eid=$employerid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}

function addEmployer( $name, $surname, $email, $password, $experience, $phone, $roli){
  global $dbconn;
  $sql = "INSERT INTO employers (`name`, `surname`, `email`, `password`, `experience`, `phone`, `roli`) ";
  $sql .= "VALUES ('$name', '$surname', '$email', '$password', $experience, $phone, $roli)";  
  $result = mysqli_query($dbconn, $sql);
  if($result){
    echo "Employer added successfully";
  } else {
    echo "Failed to add employer";
    die(mysqli_error($dbconn));
  }
}

function editEmployer($employerid, $name, $surname, $email, $password, $experience, $phone, $projectid){
  global $dbconn;
  $sql = "UPDATE employers SET name='$name',surname='$surname',email='$email',";
  $sql .= "password='$password',experience='$experience',phone='$phone', pid=$projectid WHERE eid=$employerid";
  
  $result = mysqli_query($dbconn, $sql);
  
  if($result){
    echo "Employer edited successfully";
  } else {
    echo "Employer edit failed: " . mysqli_error($dbconn);
  }
}


function deleteEmployer($employerid){
  global $dbconn;
  $sql = "DELETE FROM employers WHERE eid=$employerid";
  $result = mysqli_query($dbconn, $sql);
  if($result){
      echo "Employer deleted successfully";
  } else {
      echo "Failed to delete employer";
  }
}

function getServices(){
  global $dbconn;
  $sql =  "SELECT sid, service_name, service_description FROM services";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    return $result;
  }else{
    echo "No Data Found";
  }
}

function getServiceId($service_id){
  global $dbconn;
  $sql = "SELECT sid, service_name, service_description FROM services WHERE sid=$service_id";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    return mysqli_fetch_assoc($result);
  } else {
    echo "No Data Found";
  }
}


function editService($service_id, $name, $description){
  global $dbconn;
  $sql = "UPDATE services SET service_name='$name',service_description='$description' WHERE sid=$service_id";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    header("Location: services.php");
  }
  else{
    echo "Service edit failed: " . mysqli_error($dbconn);
  }
}

function addService($name, $description){
  global $dbconn;
  $sql = "INSERT INTO services(service_name, service_description) VALUES ('$name','$description')";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    header("Location: services.php");
  }else{
    echo "Service edit failed: " . mysqli_error($dbconn);
  }
}

function deleteService($service_id){
  global $dbconn;

  $sql = "DELETE FROM services WHERE sid=$service_id";
  $result = mysqli_query($dbconn, $sql);

  if ($result) {
    header("Location: services.php");
  } else {
    echo "Service edited failed: " . mysqli_error($dbconn);
  }
}

function getProjects(){
  global $dbconn;
  $sql = "SELECT pid, name,description, start_date, end_date FROM projects";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    return $result;
  } else {
    echo "No Data Found";
  }
}

function getProjectId($projectid){
  global $dbconn;
  $sql = "SELECT * FROM projects"; 
  $sql .= " WHERE pid=$projectid";
  $result = mysqli_query($dbconn, $sql);
  
  if($result && mysqli_num_rows($result) > 0){
    return mysqli_fetch_assoc($result);
  }else{
    return null; 
  }
}

function addProject($name, $description, $start_date, $end_date, $serviceid){
  global $dbconn;
  $sql = "INSERT INTO `projects`(`name`, `description`, `start_date`, `end_date`, `sid`) ";
  $sql .= "VALUES ('$name', '$description', '$start_date', '$end_date', $serviceid)";  
  $result = mysqli_query($dbconn, $sql);
  if($result){
    echo "Project added successfully";
  } else {
    echo "Failed to add project";
    die(mysqli_error($dbconn));
  }
}

function editProject($projectid, $name, $description, $start_date, $end_date, $serviceid) {
  global $dbconn;

  $sql = "UPDATE projects SET name ='$name', description='$description', ";
  $sql .= "start_date='$start_date', end_date='$end_date', sid='$serviceid' WHERE pid=$projectid";

  $result = mysqli_query($dbconn, $sql);

  if ($result) {
    echo "Project edited successfully";
  } else {
    echo "Project edit failed: " . mysqli_error($dbconn);
  }
}

function deleteProject($projectid){
  global $dbconn;

  $sql = "DELETE FROM projects WHERE pid=$projectid";
  $result = mysqli_query($dbconn, $sql);

  if ($result) {
    echo "Project deleted successfully";
  } else {
    echo "Project edited failed: " . mysqli_error($dbconn);
  }
  
}

function contactUs($name, $surname, $email, $message, $created_at){
  global $dbconn;
  $sql = "INSERT INTO `contact_messages`(`name`, `surname`, `email`, `message`, `created_at`) ";
  $sql .= "VALUES ('$name','$surname','$email','$message','$created_at')";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    echo "Message sent successfully";
  } else {
    echo "Failed to send message";
    die(mysqli_error($dbconn));
  }
}

function getContactUsMessages(){
  global $dbconn;
  $sql="SELECT `id`, `name`, `surname`, `email`, `message`, `created_at` FROM `contact_messages`";
  $result = mysqli_query($dbconn, $sql);
  if($result){
    return $result;
  }else{
    echo "No Data Found";
  }
}


function detailsEmployer() {
  global $dbconn;
  $sql = "SELECT p.pid, p.name AS project_name, p.description AS project_description, p.start_date, p.end_date, e.name AS employer_name, s.service_name, s.service_description FROM Projects AS p JOIN Employers AS e ON p.pid = e.pid JOIN Services AS s ON p.sid = s.sid";
  $result = mysqli_query($dbconn, $sql);
  if ($result) {
      return $result;
  } else {
      echo "No Data";
  }
}

function getDetailsId($employerid)
{
  global $dbconn;
  $sql = "SELECT p.pid, p.name AS project_name, p.description AS project_description, p.start_date, p.end_date, e.name AS employer_name, s.service_name, s.service_description FROM Projects AS p JOIN Employers AS e ON p.pid = e.pid JOIN Services AS s ON p.sid = s.sid";
  $sql .= " WHERE e.eid = $employerid";
  $result = mysqli_query($dbconn, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
      return mysqli_fetch_assoc($result);
  } else {
      echo "No Data";
  }
}

function getEmployer($employerid) {
  global $dbconn;
  $sql = "SELECT * FROM employers WHERE eid = $employerid";
  $result = mysqli_query($dbconn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $employer = mysqli_fetch_assoc($result);
    return $employer; 
  } else {
    die("User not found.");
  }
}


function profileEdit($name, $surname, $email, $password) {
  global $dbconn, $employerid;
  $sql = "UPDATE employers SET name = '$name', surname = '$surname', email = '$email', password = '$password' WHERE eid = $employerid";
  $result = mysqli_query($dbconn, $sql);

  if ($result) {
      header("Location: profile.php");
  } else {
     echo "Failed to update profile";
  }
}
