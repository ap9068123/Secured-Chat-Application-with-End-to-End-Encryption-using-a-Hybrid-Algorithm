<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header style="font-size: 32px;">Secured Chat Application</header>
      <br><br>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          
          <input type="text" name="email" placeholder="E-mail" required>
          <br><br>
        </div>
        <div class="field input">
          
          <input type="password" name="password" placeholder="Password" required>
          
          <i class="fas fa-eye" style="color:black;"></i>
          
        </div>
        <br>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php" style="color:white">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
