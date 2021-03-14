<?php include "includes/header.php";?>
<h2>Welcome <?php
          //  echo $_SESSION['userName'];
      ?></h2>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">


<H2>Payment form</H2>

<article class="card">
<div class="card-body p-5">

<ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
		<i class="fa fa-credit-card"></i> Credit Card</a></li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
		<i class="fab fa-paypal"></i>  Paypal</a></li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
		<i class="fa fa-university"></i>  Bank Transfer</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane fade show active" id="nav-tab-card">
	
	<form role="form">
	<div class="form-group">
		<label for="username">Full name (on the card)</label>
		<input type="text" class="form-control" name="username" placeholder="" required="">
	</div> <!-- form-group.// -->

	<div class="form-group">
		<label for="cardNumber">Card number</label>
		<div class="input-group">
			<input type="text" class="form-control" name="cardNumber" placeholder="">
			<div class="input-group-append">
				<span class="input-group-text text-muted">
					<i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>   
					<i class="fab fa-cc-mastercard"></i> 
				</span>
			</div>
		</div>
	</div> <!-- form-group.// -->

	<div class="row">
	    <div class="col-sm-8">
	        <div class="form-group">
	            <label><span class="hidden-xs">Expiration</span> </label>
	        	<div class="input-group">
	        		<input type="number" class="form-control" placeholder="MM" name="">
		            <input type="number" class="form-control" placeholder="YY" name="">
	        	</div>
	        </div>
	    </div>
	    <div class="col-sm-4">
	        <div class="form-group">
	            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
	            <input type="number" class="form-control" required="">
	        </div> <!-- form-group.// -->
	    </div>
	</div> <!-- row.// -->
    <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_GmBhP5ftCQOi54" async> </script> </form>
	</form>
</div> <!-- tab-pane.// -->
<div class="tab-pane fade" id="nav-tab-paypal">
<p>Paypal is easiest way to pay online</p>
<form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_GmBhP5ftCQOi54" async> </script> </form>

</div>
<div class="tab-pane fade" id="nav-tab-bank">
<form role="form">
<p>Bank accaunt details</p>

  <div class="form-group">
		<label for="username">Bank Name</label>
		<input type="text" class="form-control" name="username" placeholder="" required="">
	</div>

    <div class="form-group">
		<label for="cardNumber">Account number</label>
		<div class="input-group">
			<input type="text" class="form-control" name="accNumber" placeholder="">
			<div class="input-group-append">
				<span class="input-group-text text-muted">
                <i class="fas fa-university"></i>    
				</span>
			</div>
		</div>
	</div> <!-- form-group.// -->

    <div class="form-group">
		<label for="cardNumber">IFSC Code</label>
		<div class="input-group">
			<input type="text" class="form-control" name="ifsc" placeholder="">
			<div class="input-group-append">
				<span class="input-group-text text-muted">
                   
				</span>
			</div>
		</div>
	</div> 
    
</form>
<form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_GmBhP5ftCQOi54" async> </script> </form>
</div> <!-- tab-pane.// -->
</div> <!-- tab-content .// -->

</div> <!-- card-body.// -->
</article> <!-- card.// -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->

<br><br>
<article class="bg-secondary mb-3">  
<div class="card-body text-center">

    
</article>
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
