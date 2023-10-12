<?php 
  include 'inc/header.php';
  $services = getServices();
?>

<section class="projects">
  <?php if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { ?>
    <a href="addservice.php">Add</a>
  <?php } ?>
  <table class="styled-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
          <?php if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { ?> 
            <td>Edit</td>
            <td>Delete</td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php while ($service = mysqli_fetch_assoc($services)) { ?>
<tr>
    <td><?php echo $service["service_name"]; ?></td>
    <td><?php echo substr($service["service_description"], 0, 20) . "..."; ?></td>
<?php
    if (isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { 
      echo "<td><a href='editservice.php?sid=" . $service['sid'] . "'>Edit</a></td>";
      echo "<td><a href='deleteservice.php?sid=" . $service['sid'] . "'>Delete</a></td>";
  }
    echo "</tr>";
 } ?>

    </tbody>
  </table>
</section>
  
<style>
  .projects a {
  display: inline-block;
  padding: 10px 20px;
  background-color: #3498db;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  transition: background-color 0.3s ease;
  margin-left: 20px;
}
</style>