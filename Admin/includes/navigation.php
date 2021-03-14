<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">
      Standard Chartered
           </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" form action="search.php" method="post">
      <div class="input-group">
        
        <input name="searchText" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="searchedBTN" class="btn btn-primary" type="submit">
                 <i class="fas fa-search"></i>
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
      </div>
    </form>



<!-- 
                    // $query = "SELECT * FROM registration LIMIT 3";
                    // $query_result = mysqli_query($connection,$query);

                    // if($query_result)
                    // {
                       
                    //     while($row = mysqli_fetch_assoc($query_result))
                    //     {
                    //         $ev_Name = $row['ev_title'];

                    //        echo " <li><a href='#'>$ev_Name</a></li>";
                    //     }
                    // }
                    // else
                    // {
                    //     echo "Error in Query";
                    // } -->
                   


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="includes/logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>
