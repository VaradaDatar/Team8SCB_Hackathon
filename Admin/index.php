<?php include "includes/header.php";?>

<h2>Welcome <?php
           echo $_SESSION['name'];
      ?></h2>

       <!-- Area Chart Example-->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Your Investment</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        
        </div>

        <p class="small text-center text-muted my-5">
          <em>More detailed reports coming soon..</em>
        </p>

      </div>
      <!-- /.container-fluid -->

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

 
