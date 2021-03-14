<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
<h2>Welcome <?php
          //  echo $_SESSION['userName'];
      ?></h2>
 
 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data"> 
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" class="form-control" name="age" placeholder="Enter Your Age" required>
    </div>
<div class="form-group">
      <label for="goal">Goal:</label>
      <input type="text" class="form-control" name="goal" placeholder="Enter Goal Name" required>
    </div>
<div class="form-group">
      <label for="target">Target:</label>
      <input type="number" class="form-control"  name="target" placeholder="Enter the Target Amount"required>
    </div>

<div class="form-group">
      <label for="rate">Expected Rate of Interest:</label>
      <input type="number" class="form-control"  name="rate" placeholder="Enter the expected rate of interest" required>
    </div>

<div class="form-group">
      <label for="tenure">Tenure:</label>
      <input type="number" class="form-control"  name="tenure" placeholder="Enter the Tenure in Years" required>
    </div>

    
    <button type="submit" class="btn btn-default" name="Submit2">Submit</button>
    
  </form>
</div>
</div>



<?php
if (!$connection) {
  $name=$_POST['name'] ;
$age=$_POST['age']; 
$goal=$_POST['goal'];
$rate=$_POST['rate'];
$target=$_POST['target']; 
$tenure=$_POST['tenure'];


$tenure=$tenure*12;

   
$i=(float)(($rate ) / (12*100));

 
  
$amount_per_month=($target * $i)  / (pow(1+$i,$tenure)-1 * (1+$i) );
$year=$amount_per_month*12;}
else{
  die("Connection failed: " . mysqli_connect_error());
}
  

if(isset($_POST["Submit2"]))
{
  
echo "<p class='alert alert-success mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ' font weight:'700'>".$nm."  Require INR ".$amount_per_month." Investment Per Month and INR ".$year." Investment Per Year</p><br>";
echo '<br><br><a class="btn btn-primary mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 " href="#" role="button">Proceed to next step</a>';

}


$sql="INSERT INTO goals(name,age,goal_name,target,tenure,monthly_amt,rate) VALUES ('$name','$age', '$goal','$target','$tenure','$amount_per_month','$rate')";

if($conn->query($sql)){
  echo "";

}
else
{
  echo "not";
}

$conn->close();
?> 

      <?php include "includes/footer.php";?>

</div>
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="includes/logout.php">Logout</a>
      </div>
    </div>
  </div>
</div>