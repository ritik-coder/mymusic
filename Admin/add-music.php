<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
     exit;
}


 $showalert=false;
 $showerror=false;

if(isset($_FILES['music'])){
     
      include '../common/config.php';
      $music=$_FILES["music"];
      $picture=$_FILES["picture"];
      $music_name=$_FILES['music']['name'];
      $picture_name=$_FILES['picture']['name'];
      $Elbum=$_POST["Elbum"];
      $categery=$_POST["categery"];
      $addedby=$_POST["addedby"];


      $extsql="Select * from music where music='$music_name'";
      $result=mysqli_query($conn, $extsql);
      $num=mysqli_num_rows($result);
      if($num==1){
          $showerror="song  already exists";
          
      }
      else{

          $sql="INSERT INTO `music` (`music`,`categery`,`Elbum`, `musicpic`,`addedby`) VALUES ('$music_name', '$categery','$Elbum', '$picture_name','$addedby')";
          $result=mysqli_query($conn, $sql);
          if($result){    
              

            $music_name=$_FILES['music']['name'];
            $music_temp=$_FILES['music']['tmp_name'];
            move_uploaded_file($music_temp,"../music/".$music_name);
            
            // for uploading the picture in server
               $pic_name=$_FILES['picture']['name'];
                $pic_temp=$_FILES['picture']['tmp_name'];
                move_uploaded_file($pic_temp,"../musicpic/".$picture_name);


            $showalert="song added successfully";
          }

      
      else{
          $showerror="song not added try again";
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

    <title>add new music | melody</title>

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
if($showalert){
echo '
<body class="bg-gradient-primary">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success! </strong>'.  $showalert.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> ';

}
?>
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

                <!-- Begin Page Content -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-11">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add  a new music !</h1>
                            </div>

                            <form class="user" action="/GANNA/Admin/add-music.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <label ><strong>Upload  the music :<strong> </label>
                                            <input type="file" accept="audio/mp3" class="form-control form-control-user py-1"
                                                id="music"  name="music"
                                                placeholder="Enter Music Name...">
                                        </div>

                                        <div class="form-group">
                                        <label ><strong>Upload  the music picture :<strong> </label>
                                            <input type="file" accept="image/jpeg"  class="form-control form-control-user py-1"
                                                id="picture"  name="picture"
                                                placeholder="Enter Music Pic...">
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="categery"
                                                id="categery" placeholder="Enter Music category  name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="Elbum"
                                                id="Elbum" placeholder="Enter Music Elbum name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="addedby"
                                                id="addedby" placeholder=" Music Added By">
                                        </div>
                                        
                                       
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Add Music
                                        </button>
                                      
                                    </form>
                      
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





























































