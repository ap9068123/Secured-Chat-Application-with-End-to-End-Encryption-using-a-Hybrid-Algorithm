<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header style="font-size: 32px;">Secured Chat Application</header>
      <br>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            
            <input type="text" name="fname" placeholder="First name" required>
          </div>

         
          <div class="field input">
           
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>

        <br><br>
        <div class="field input">
          
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
        <br><br>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <br><br>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php" style="color:white;">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
