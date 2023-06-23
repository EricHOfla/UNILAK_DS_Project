<?php
session_start();
require 'db.php';
if (!$_SESSION) {
  header("location:index.php");
}
?>



<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <title>Group Work CAT 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
      *{
        font-size: 14px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }
   .row{
    display: flex;
    padding:10 20px;
    margin: 20px 100px;
   
   }
   input,select,button{
    padding: 5px;
    border-radius: 3px;
    border-bottom: solid rgb(15, 235, 15);
    outline: none;
    
   }
   button:hover{
    background-color: rgb(15, 235, 15);
    color: white;
   }
   .btnd{
    padding: 5px;
    border-radius: 3px;
    border-bottom: solid rgb(235, 15, 15);
    outline: none;
   }
   .btnd:hover{
    background-color:  rgb(235, 15, 15);
    color: white;
   }
   .btne{
    padding: 7px;
    border-radius: 3px;
    border-bottom: solid rgb(255, 182, 24);
    outline: none;
   }
   .btne:hover{
    background-color:  rgb(255, 182, 24);
    color: white;
   }
   .hr .hrr{
    width: 2px;
    background-color: rgba(73, 68, 68, 0.521);
    height: 43rem;
    margin: 3px 20px;
   }
   .br{
    margin: 0 30px;
   }
   hr{
    width: 12rem;
    margin-right: 400px;
   }
   .container{
    border-radius: 8px;
    border: #6666ff 4px solid;
    width: 100rem;
    margin:0 90px;
   }
   center h1 a{
    font-size: 20px;
   }
   i{
    margin: 0 10px;
    font-size: 20px;
   }
   fieldset{
    width: 30rem;
    height: 17rem;
   }
   td,th{
    font-size: 16px;
   }
   
   

</style>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Group work (Cat 2)</title>
  </head>
  <body>
<br>
    <div class="container">
      
      <br>
      <center><h1>  <a href="#">DATA STRUCTURE PROJECT GROUP 1</a></h1></center>
              
        <div class="row">
          <div class="col-lg-6">
           <h1>Stack Operations</h1>
          <hr>
            <br>
            <h3>Addition of new elements</h3>
            <div>
            <?php
                if (isset($_POST['addItem'])) {
                  $itemname= $_POST['itemname'];

                  $query="SELECT * FROM store WHERE name='$itemname' AND category=1";
       
                  $row=mysqli_query($connection,$query);
                   $execution=mysqli_num_rows($row);
                  if($execution>0)
                    {
                      ?>
                <script>
                 alert("This Data is Already Exist\nTry New Data");
  
                 </script>
                <?php
                    }
                    else{

                $sq = "INSERT INTO `store`(`name`, `category`) VALUES ('$itemname',1)";
                $resul=mysqli_query($connection,$sq);
	        if($resul==true)
	        {
		    
            echo"<meta http-equiv='refresh' content='0;url=dash.php'>";
	        }	}
                }
               ?>
              <form action="" method="post">
            <label for="">New element:</label>&nbsp;
            <input type="text" name="itemname" class="form-control" style="width: 350px;">&nbsp;
            
            <button type="submit" class="btn" name="addItem">ADD</button>
            </form>
            </div>
           
            <h4>Deletion of element</h4>
            <div>
              <form action="" method="post">
            <label for="">Select Element to Delete:</label>&nbsp;
            <select name="itemid"class="custom-select" style="width: 250px;">
            <option selected>Open this select menu</option> 
            <?php 
            include"db.php";
           $query='SELECT * FROM store WHERE category=1';
       
         $row=mysqli_query($connection,$query);
          $execution=mysqli_num_rows($row);
         if($execution>0)
           {
          while ($record=mysqli_fetch_array($row))
          {
           echo'
            
                <option value="'.$record["id"].'">'.$record["name"].'</option>

                ';
            }}
            ?>
              </select>&nbsp;
            <button type="submit" class="btnd" name="delete">Delete</button>
            </form>
            </div>
            <br>
          
            <div>
                <label for="">Display elements:</label>&nbsp;
                <form action="" method="post">
           
                <button type="submit" name="Asc" class="btn-p">Sort Asc <i class="bi bi-arrow-down"></i></button>&nbsp;&nbsp;
                
                <button type="submit" name="Desc" class="btn-p">Sort Desc <i class="bi bi-arrow-up"></i></button>
                </form>
            </div>
            <br>
            
            <!-- <textarea name="" id="" cols="60" rows="7"></textarea> -->
            <fieldset>
            <legend>List of Data</legend>

            <table>
  <tr>
    <!-- <th>#</th> -->
    <th>Our Data</th>
    
  </tr>


  <?php
include"db.php";

if (isset($_POST['Asc'])) {

$query='SELECT * FROM store WHERE category=1 ORDER BY name ASC';
$row=mysqli_query($connection,$query);
$execution=mysqli_num_rows($row);
if($execution>0)
{
  $count=1;
while ($record=mysqli_fetch_array($row))
{
  echo'<tr>';
      //  echo'<td>'.$count."</td>";
       echo'<td>'.$record["name"].'</td>';
       
       
       
    echo'</tr>';
    $count++;
}}}
elseif (isset($_POST['Desc'])) {

  $query='SELECT * FROM store WHERE category=1 ORDER BY name DESC';
$row=mysqli_query($connection,$query);
$execution=mysqli_num_rows($row);
if($execution>0)
{
  $count=1;
while ($record=mysqli_fetch_array($row))
{
  echo'<tr>';
      //  echo'<td>'.$count."</td>";
       echo'<td>'.$record["name"].'</td>';
       
       
       
    echo'</tr>';
    $count++;
}}
 
}else{


  $query='SELECT * FROM store WHERE category=1';
  $row=mysqli_query($connection,$query);
  $execution=mysqli_num_rows($row);
  if($execution>0)
  {
    $count=1;
  while ($record=mysqli_fetch_array($row))
  {
    echo'<tr>';
        //  echo'<td>'.$count."</td>";
         echo'<td>'.$record["name"].'</td>';
         
         
         
      echo'</tr>';
      $count++;
  }}


}




?>
</table>
</fieldset>
 
           
          </div>
          <br>
            <div class="hr">
              <div class="hrr">

              </div>
         <button type="submit" class="btne"><a href="logout.php" class="btne">Exit</a></button>
            </div>
            
           <div class="col-lg-6 br">
          <h1>Queue Operations</h1>
           <hr>
           <br>            
            <h3>Addition of new elements</h3>
            <?php
                if (isset($_POST['add'])) {
                $item = $_POST['item'];
                $query="SELECT * FROM store WHERE name='$item' AND category=2";
       
                $row=mysqli_query($connection,$query);
                 $execution=mysqli_num_rows($row);
                if($execution>0)
                  {
                    ?>
              <script>
               alert("This Data is Already Exist\nTry New Data");

               </script>
              <?php
                  }
                  else{

                $ql = "INSERT INTO `store`(`name`, `category`) VALUES ('$item',2)";
                $rsult=mysqli_query($connection,$ql);
	        if($rsult==true)
	        {
		        
            echo"<meta http-equiv='refresh' content='0;url=dash.php'>";
	        }
        }
                }
               ?>
            <div>
              <form action="" method="post">
            <label for="">New element:</label>&nbsp;
            <input type="text" name="item" class="form-control" style="width: 350px;">&nbsp;
            <button type="submit" class="btn-p" name="add">ADD</button>
            </form>
            </div>
           
            <h4>Deletion of element</h4>
            <div>
              <form action="" method="post">
            <label for="">Select Element to Delete:</label>&nbsp; 
            <select name="itemid" class="custom-select" style="width: 250px;">
            <option selected>Open this select menu</option> 
            <?php 
            include"db.php";
           $query='SELECT * FROM store WHERE category=2';
       
         $row=mysqli_query($connection,$query);
          $execution=mysqli_num_rows($row);
         if($execution>0)
           {
          while ($record=mysqli_fetch_array($row))
          {
           echo'
            
                <option value="'.$record["id"].'">'.$record["name"].'</option>

                ';
            }}
            ?>
              </select>&nbsp;
            <button type="submit" class="btnd" name="remove">Delete</button>
            </form>
            </div>
            <br>
            
            <div>
                <label for="">Display elements:</label>&nbsp;
                <form action="" method="post">
           
                <button type="submit" name="Ascc" class="btn-p">Sort Asc <i class="bi bi-arrow-down"></i></button>&nbsp;&nbsp;
                <button type="submit" name="Descc" class="btn-p">Sort Desc <i class="bi bi-arrow-up"></i></button>
                </form>
            </div>
            <br>
            
           
            <fieldset>
            <legend>List of Data</legend>

            <table>
  <tr>
    <!-- <th>#</th> -->
    <th>Our Data</th>
    
  </tr>


  <?php
include"db.php";

if (isset($_POST['Ascc'])) {

  $query='SELECT * FROM store WHERE category=2 ORDER BY name ASC';
  $row=mysqli_query($connection,$query);
  $execution=mysqli_num_rows($row);
  if($execution>0)
  {
    $count=1;
  while ($record=mysqli_fetch_array($row))
  {
    echo'<tr>';
        //  echo'<td>'.$count."</td>";
         echo'<td>'.$record["name"].'</td>';
         
         
         
      echo'</tr>';
      $count++;
  }}}
  elseif (isset($_POST['Descc'])) {
  
    $query='SELECT * FROM store WHERE category=2 ORDER BY name DESC';
  $row=mysqli_query($connection,$query);
  $execution=mysqli_num_rows($row);
  if($execution>0)
  {
    $count=1;
  while ($record=mysqli_fetch_array($row))
  {
    echo'<tr>';
        //  echo'<td>'.$count."</td>";
         echo'<td>'.$record["name"].'</td>';
         
         
         
      echo'</tr>';
      $count++;
  }}
   
  }else{
  
  
    $query='SELECT * FROM store WHERE category=2';
    $row=mysqli_query($connection,$query);
    $execution=mysqli_num_rows($row);
    if($execution>0)
    {
      $count=1;
    while ($record=mysqli_fetch_array($row))
    {
      echo'<tr>';
          //  echo'<td>'.$count."</td>";
           echo'<td>'.$record["name"].'</td>';
           
           
           
        echo'</tr>';
        $count++;
    }}
  
  
  }
  
  





?>
</table>
</fieldset>
 
           
          </div>
        </div>
      </div>


  </body>
</html>

<?php
include"db.php"; 
if (isset($_POST['remove'])) {
    $itemid = $_POST['itemid'];

  $sql="SELECT * FROM store
  WHERE id=(SELECT MIN(id) FROM store WHERE category=2)";
  $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result) > 0) {
  
       $rows = mysqli_fetch_array($result);
  
                
      if($rows["id"] =="$itemid")
               {
                $sqll="DELETE FROM store WHERE id='$itemid'";
       $resultt=mysqli_query($connection,$sqll);
      if($resultt==true)
      {
      ?>
       <script>
       alert("Queue Deleted");
  
        </script>
       <?php
      echo"<meta http-equiv='refresh' content='0;url=dash.php'>";
    }else{
      ?>
      <script>
      alert("Queue Not Deleted");
 
       </script>
      <?php
    }
  }else {
    ?>
       <script>
       alert("Queue Overflow\n\nYou Break Queue Rules");
  
        </script>
       <?php
  }
}
  }
        

?>

<?php
include"db.php"; 

  if (isset($_POST['delete'])) {
    $itemid = $_POST['itemid'];

  $sql="SELECT * FROM store
  WHERE id=(SELECT MAX(id) FROM store WHERE category=1)";
  $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result) > 0) {
  
       $rows = mysqli_fetch_array($result);
  
                
      if($rows["id"] =="$itemid")
               {
                $sqll="DELETE FROM store WHERE id='$itemid'";
       $resultt=mysqli_query($connection,$sqll);
      if($resultt==true)
      {
      ?>
       <script>
       alert("Stack Deleted");
  
        </script>
       <?php
      echo"<meta http-equiv='refresh' content='0;url=dash.php'>";
    }else{
      ?>
      <script>
      alert("Stack Not Deleted");
 
       </script>
      <?php
    }
  }else {
    ?>
       <script>
       alert("Stack Overflow\n\nYou Break Stack Rules");
  
        </script>
       <?php
  }
}
  }
        
               
   ?> 
            