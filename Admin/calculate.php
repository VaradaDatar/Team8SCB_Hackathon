<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
<form method="post">
    <label for="amount">Enter Name</label>
    <input type="text" name="name" id="name"/><br/>
    <label for="amount">Enter Age</label>
    <input type="text" name="age" id="age"/><br/>
    <label for="amount">Enter Goal</label>
    <input type="text" name="goal" id="goal"/><br/>
    <label for="amount">Enter Target Amount</label>
    <input type="text" name="target" id="target"/><br/>
    
    <br/>
    <label for="interest">Expected Interest Amount</label>
    <input name="rate" id="rate"/><br/>
    <select name="tenure">
        <option value="12">1 Year</option>
        <option value="24">2 Years</option>
        <option value="36">3 Years</option>
        <option value="48">4 Years</option>
        <option value="60">5 Years</option>
    </select>
    <input type="submit" name="submit" value="Calculate">
<?php
if ($_POST && isset($_POST["submit"])) {
    // Basic validation
  
        $name = $_POST["name"];
        $age = $_POST["age"];
        $goal = $_POST["goal"];
        $target = $_POST["target"];
        $rate = $_POST["rate"];
        $tenure = $_POST["tenure"];
        $query="INSERT INTO goals(name,age,goal,target,rate,tenure) VALUES ('$name','$age','$goal','$target','$rate','$tenure')";
                    $result=mysqli_query($connection,$query);
                    if($result)
                         {
                         echo "Data Save Successful";

                        }
                        else
                        {
                            echo "error";
                        }
        if (is_numeric($target) && is_numeric($rate) && is_numeric($tenure)) {
            if ($rate > 0 && $rate <= 100) {
                // Compound interest formula: http://en.wikipedia.org/wiki/Compound_interest#Compound_Interest
                // (It may be a bit confusing at first, but it is easier than calculating in the iterative way :))
                // (Also, arithmetic progressions are good :D)
                

                $i=(float)(($rate ) / (12*100));

                $amount_per_month=($target * $i)  / (pow(1+$i,$tenure)-1 * (1+$i) );
                $year=$amount_per_month*12;}
                if(isset($_POST["submit"]))
                    {
                    
                    echo "<p class='alert alert-success mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ' font weight:'700'>".$name."  Require INR ".$amount_per_month." Investment Per Month and INR ".$year." Investment Per Year</p><br>";
                    echo '<br><br><a class="btn btn-primary mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 " href="payment.php" role="button">Proceed to next step</a>';

                    }
            } else {
                echo "Invalid interest rate. It should be a number between 0 and 100.";
            }
         
    } else {
        echo "You have not filled in all required fields.";
    }




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


