<?php 
  include 'inc/header.php';
  $messages = getContactUsMessages();
?>
<link rel="stylesheet" href="style.css">
<section>
  <table class="styled-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
      <?php while($message = mysqli_fetch_assoc($messages)) { ?>
        <?php if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { ?> 
      <tr>
        <td><?php echo $message["name"] . " " . $message["surname"]; ?></td>
        <td><?php echo $message["email"]; ?></td>
        <td><?php echo $message["message"]; ?></td>
        <td><?php echo $message["created_at"]; ?></td>
          <?php } ?>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</section>
  