<?php include "inc/header.php"; ?>
<link rel="stylesheet" href="static/css/form.css">
<?php
    if(isset($_GET['eid'])){
        $employer = getEmployerId($_GET['eid']);
        $employerid = $employer['eid'];
        $name = $employer['name'];
        $surname = $employer['surname'];
        $email = $employer['email'];
        $experience = $employer['experience'];
    }
    
    if (isset($_POST['delete'])) {
        deleteEmployer($employerid);
        header("Location: index.php");
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
            <label>Surname: </label>
            <input disabled type="text" id="surname" name="surname" value="<?php if(!empty($surname)) echo $surname; ?>">
        </div>
        <div class="input-row">
            <label>Email: </label>
            <input disabled type="text" id="email" name="email" value="<?php if(!empty($email)) echo $email; ?>">
        </div>
        <div class="input-row">
            <label>Experience: </label>
            <input disabled type="text" id="experience" name="experience" value="<?php if(!empty($experience)) echo $experience; ?>">
        </div>
        <div class="input-row">
            <input type="submit" name="delete" id="submit-button" value="Delete">
        </div>
    </form>
</div>
