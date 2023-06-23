<?php
  session_start();

include('db.php');




if (isset($_POST['submit'])) {


$username=$_POST['username'];
$password=$_POST['password'];


$sql="SELECT * FROM users WHERE username='".$username."' AND password='".$password."' ";
$result=mysqli_query($connection,$sql);
  if (mysqli_num_rows($result) > 0) {

            $rows = mysqli_fetch_array($result);

         
if($rows=true)
{
  $_SESSION["username"] = $username;
header("location:dash.php");


 }





}
else{
   echo " <script> alert('Incorrect username or password')</script>";
}

}
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
        <div class="alert alert-danger">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    <form method="post">
        <div class="form-group">
          <label for="name" class="text-info">Username</label>
          <input type="text" name="username" id="name" class="form-control" placeholder="Please Provide Username">
        </div>
        <div class="form-group">
          <label for="email" class="text-info">Password</label>
          <input type="password" name="password" id="email" class="form-control" placeholder="Provide your Password">
        </div>
        <div class="form-group d-flex justify-content-center">
          <button type="submit" name="submit" class="btn btn-sm btn-danger">Login </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
          <a href="create.php"><span class="badget bg-info text-white"> Register a new User</span></a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
