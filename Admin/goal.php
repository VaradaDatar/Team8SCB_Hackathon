   

<html lang="en">
<head>
  <title>Your Goals</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
 
    
   body {
    background-color: white;
}

#loginbox {
    margin-top: 30px;
}

#loginbox > div:first-child {        
    padding-bottom: 10px;    
}

.iconmelon {
    display: block;
    margin: auto;
}

#form > div {
    margin-bottom: 25px;
}

#form > div:last-child {
    margin-top: 10px;
    margin-bottom: 10px;
}

.panel {    
    background-color: transparent;
}

.panel-body {
    padding-top: 30px;
    background-color: rgba(2555,255,255,.3);
}

#particles {
    width: 100%;
    height: 100%;
    overflow: hidden;
    top: 0;                        
    bottom: 0;
    left: 0;
    right: 0;
    position: absolute;
    z-index: -2;
}

.iconmelon,
.im {
  position: relative;
  width: 150px;
  height: 150px;
  display: block;
  fill: #525151;
}

.iconmelon:after,
.im:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<div class="jumbotron">
<center>
  <img src="ss.png" height="45px">
  <h2>Your Goals</h2>
  <p>Investment Calculation for your Future goals Simplified</p>
</center>
  
</div>
<div class="container">
  


  <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 

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
$name=$_POST['name'] ;
$age=$_POST['age']; 
$goal=$_POST['goal'];
$rate=$_POST['rate'];
$target=$_POST['target']; 
$tenure=$_POST['tenure'];


$tenure=$tenure*12;

   
$i=(float)(($rate ) / (12*100));

 
  
$amount_per_month=($target * $i)  / (pow(1+$i,$tenure)-1 * (1+$i) );
$year=$amount_per_month*12;

if(isset($_POST["Submit2"]))
{
  
echo "<p class='alert alert-success mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ' font weight:'700'>".$nm."  Require INR ".$amount_per_month." Investment Per Month and INR ".$year." Investment Per Year</p><br>";
echo '<br><br><a class="btn btn-primary mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 " href="#" role="button">Proceed to next step</a>';

}


$sql="INSERT INTO goals(name,age,goal_name,target,tenure,monthly_amt,rate) VALUES ('$nm','$age', '$goal','$target','$tenure','$amount_per_month','$rate')";

if($conn->query($sql)){
  echo "";

}
else
{
  echo "not";
}

$conn->close();
?> 

</body>
</html>
