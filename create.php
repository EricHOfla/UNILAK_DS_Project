<?php
include"db.php";

if(isset($_POST['submit'])) {
  $full=$_POST['fullname'];
  $username=$_POST['username'];
  $password=$_POST['password'];
   
  $sql="INSERT INTO `users`(`id`, `fullname`, `username`, `password`) 
  VALUES (null,'$full','$username','$password')";


$res=mysqli_query($connection,$sql);
if ($res) {
  ?>
<script>
  alert("Your registration has been successfull. Thank you!");

</script>

<?php
 echo"<meta http-equiv='refresh' content='0;url=index.php'>";
  }}

?>
<?php require 'header.php'; ?>
<div class="container" style="width: 500px;">
  <div class="card mt-5">
  <div class="card-header d-flex justify-content-between">
      <img src="./grouplogo.jpg" alt="" class="rounded-circle" width="50" height="50">
      <img src="./unilak.png" alt="" class="rounded-circle" width="50" height="50">
    </div>
    <div class="card-body">
    <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    <form method="post">
        <div class="form-group">
          <label for="name" class="text-info">Full name</label>
          <input required type="text" name="fullname" id="fullname" class="form-control" placeholder="Provide You Full Name">
        </div>
        <div class="form-group">
          <label for="name" class="text-info">Username</label>
          <input required type="text" name="username" id="name" class="form-control" placeholder="Provide your Username">
        </div>
        <div class="form-group">
          <label for="email" class="text-info">Password</label>
          <input required type="password" name="password" id="email" class="form-control" placeholder="Provide Your Password">
        </div>
        <div class="form-group d-flex justify-content-center">
          <button type="submit" name="submit" class="btn btn-sm btn-danger">register</button>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="./">
            <span class="badget bg-info text-white"><small> Go to Login Page</small></span></a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
