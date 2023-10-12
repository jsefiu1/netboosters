<?php 
  include 'inc/header.php';
?> 
  <section id="banner">
     <div class="img" width="250" height="270"></div>
     <div class="banner-text">
       <h2>Powerful Networking Switches for Seamless Connectivity</h2>
       <button>Explore Our Switch Solutions</button>
     </div>
  </section>

  <section id="about-us">
    <img src="img/about.jpg" alt="About Us">
    <div class="content" style="color: #fff">
    <h2 style="color: #fff">About Us</h2>
    <p>
      <strong>Welcome to our networking company, where we are dedicated to providing top-quality networking solutions for businesses of all sizes</strong>. With years of experience in the industry, we have established ourselves as a trusted partner for organizations seeking reliable and efficient network infrastructure.
    </p>
    <p>
      Our mission is to empower businesses with seamless connectivity, robust security, and scalable networking solutions. We understand the critical role that a well-designed and maintained network plays in today's digital landscape. Therefore, we strive to deliver cutting-edge technologies, industry best practices, and unparalleled support to meet the unique needs and challenges of our clients.
    </p>
    <p>
      At our company, we take pride in our team of highly skilled professionals who are passionate about networking. Their expertise, combined with a customer-centric approach, allows us to deliver tailored solutions that align with your business objectives. We work closely with you to understand your requirements, assess your infrastructure, and implement solutions that drive productivity, efficiency, and growth.
    </p> 
  </div>
  </section>
  
  <section id="section3">
  <h1>Our Services</h1><br>
  <div class="slider">
    <?php 
    $services = getServices(); 

    $i = 1;
    if ($services) {
      do {
        $service = mysqli_fetch_assoc($services);
        if ($service) {
          echo "<article>";
          echo "<img src='img/network{$i}.png' alt='{$service['service_name']}'>"; 
          echo "<h3>". $service['service_name'] . "</h3>";
          echo "<p>". $service['service_description'] . "</p>";
          echo "</article>";
          $i++;
        }
      } while ($i <= 3 && $service);
    }
    ?>
  </div>
  <a href="services.php">See more</a>
</section>
  <?php
  if(isset($_POST['send'])){
    $timestamp = date('Y-m-d H:i:s');
    contactUs($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['message'], $timestamp);
  }
?>
  <section id="contact-us"> 
    <div class="form" id="employer-form">
    <fieldset>
    <form method="POST" id="employer-form" action="success.php">
       <legend>Contact Us</legend>
      <div class="input-box">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Type your name">
        <span class="error-message"></span>
      </div>
      <div class="input-box">
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" placeholder="Type your surname">
        <span class="error-message"></span>
      </div>
      <div class="input-box">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Type your email">
        <span class="error-message"></span>
      </div>
      <div class="input-box">
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="20" rows="5" placeholder="Type your message"></textarea>
        <span class="error-message"></span>
      </div>
      <input type="submit" id="send" name="send" value="Send">
    </form>
  </fieldset>
   </div>

   <div class="informations">
    <h4>Employers</h4>
    <?php   if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { ?>
    <a href="addemployer.php">Add Employer</a>
    <?php } ?>
   <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Experience</th>
      <th>Details</th>
      <?php   if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") { ?>
      <th>Edit</th>
      <th>Delete</th>
      <?php } ?>
    </tr>
    <?php 
$employers = getEmployers();
$i = 0;

while ($employer = mysqli_fetch_assoc($employers)) {
  $employerid = $employer['eid'];

  if ($i % 2 == 0) {
    echo "<tr>";
  } 
  echo "<td style='color: #fff'>". $employer['name'] . ' '. $employer['surname'] . "</td>";
  echo "<td style='color: #fff'>". $employer['email'] . "</td>";
  echo "<td style='color: #fff'>". $employer['experience'] . "</td>";
  echo "<td style='color: #fff'><a href='detailsemployer.php?eid=$employerid'>Details</a></td>";

  if(isset($_SESSION['employer']['roli']) && $_SESSION['employer']['roli'] == "1") {
    echo "<td style='color: #fff'><a href='editemployer.php?eid=$employerid'>Edit</a></td>";
    echo "<td style='color: #fff'><a href='deleteemployer.php?eid=$employerid'>Delete</a></td>";
  }
  echo "</tr>";
  $i++;
}
?>
</table>
   </div>
  </section>
  
<?php
  include 'inc/footer.php';
?>