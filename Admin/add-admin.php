<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
     exit;
}






 $showalert=false;
 $showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
     
      include '../common/config.php';
      $username=$_POST["username"];
    
      $email=$_POST["email"];
      $password=$_POST["password"];
      $cpassword=$_POST["cpassword"];
       

      $extsql="Select * from admin where email='$email'";
      $result=mysqli_query($conn, $extsql);
      $num=mysqli_num_rows($result);
      if($num==1){
          $showerror="user already exists";
          
      }
      else{


       
      if(($password==$cpassword)){
        $hash=password_hash($password,PASSWORD_DEFAULT);
          $sql="INSERT INTO `admin` (`username`, `password`,`email`) VALUES ('$username', '$hash', '$email')";
          $result=mysqli_query($conn, $sql);
          if($result){    
            
            $showalert="new admin added succesfully";
          }

      }
      else{
          $showerror="Repeated password do not match";
      }
      }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>add new admin | melody</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../favicon.ico" type="image/gif" sizes="16x16">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <?php
     include('nav.php');


?>
      
      <!-- end of  Sidebar -->





        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!--  Topbar -->
                <?php
                include('topbar.php');
                ?>
           
                <!-- End of Topbar -->
                <?php
if($showerror){
echo '
<body class="bg-gradient-primary">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error! </strong>'.  $showerror.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> ';

}
?>
                <?php
if($showalert){
echo '
<body class="bg-gradient-primary">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Error! </strong>'.  $showalert.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> ';

}
?>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                  
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-11">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Join a new Admin Account !</h1>
                            </div>

                            <form class="user" action="/GANNA/Admin/add-admin.php" method="post">
                                <div class="form-group ">
                                    
                                        <input type="text" class="form-control form-control-user" id="username" name="username"
                                            placeholder="User Name">
            
                                    
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"  name="cpassword"
                                            id="cpassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Add Admin
                                </button>
                                <hr>
                              
                            </form>

                            <hr>
                          
                        </div>
                    </div>
                </div>




                </div>
                <!-- /.ending page content -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
   <!-- Logout Modal-->

   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>