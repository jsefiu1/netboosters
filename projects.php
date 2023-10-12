<?php 
  include 'inc/header.php';
  $projects = getProjects();
?>
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
<section class="projects">
  <?php if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { ?>
    <a href="addproject.php">Add</a>
  <?php } ?>
  <table class="styled-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
          <?php if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { ?> 
            <td>Edit</td>
            <td>Delete</td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php while ($project = mysqli_fetch_assoc($projects)) { ?>
<tr>
    <td><?php echo $project["name"]; ?></td>
    <td><?php echo substr($project["description"], 0, 20) . "..."; ?></td>
    <td><?php echo $project["start_date"] ?></td>
    <td><?php echo $project["end_date"] ?></td>
    <?php if (isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { 
        echo "<td><a href='editproject.php?pid=" . $project['pid'] . "'>Edit</a></td>";
        echo "<td><a href='deleteproject.php?pid=" . $project['pid'] . "'>Delete</a></td>";
    }
    echo "</tr>";
}
?>

    </tbody>
  </table>
</section>
  
