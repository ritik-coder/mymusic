<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
        <!-- Bootstrap CSS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title> Melody</title>

        <style>
     
   
          body{
            font-family: 'Cookie', cursive;
             font-size:20px;
          }
     
          
         
          .c-body {
              padding: 0;
              margin: 0;
              text-align: center;
          }
          .c-title {
              margin: 0px;             
          }
          .c-text {
              font-size: 10px;
          }



        </style>
  </head>
  <body>
   <!-- it's a navbar -->
   <?php
include '../common/nav.php';


?>


    <!-- main container -->
    <!-- main container -->
    <!-- main container -->
<?php

include '../common/config.php';

//
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){ 
  $useremail='user';
   }
 else{ $useremail=$_SESSION['email'];
    // echo $useremail;
}

//

// $sql="Select music.music, music.musicpic,music.categery,music.sr,music.addedby,music.Elbum from music
//                                                         WHERE music.Elbum='honey singh'";
$sql="Select music.music, music.musicpic,music.categery,music.sr,music.addedby,music.Elbum from music
LEFT JOIN usersong ON music.music = usersong.favoratesong WHERE usersong.useremail = '$useremail'";

// $sql="Select * WHERE music.Elbum='honey singh'";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?> 

    <!------------------------------------
                  DISCOVER
    --------------------------------------->
    <div class="container-fluid border-bottom" style="padding-bottom: 30px; background-color: whitesmoke;">
        <h1 style="color:green; text-align: center;">MY MUSIC</h1>
        <div class="container">
          <div class="row d-flex justify-content-around py-2">
          <?php
           if($num>0){                           
          while($row= mysqli_fetch_assoc($result)){
        ?>

         <div class="lg:w-1/4 sm:w-1/2" style="margin-bottom: 20px;">
        <a href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
        <img src="../musicpic/<?php echo $row['musicpic'];  ?>" style="max-height: 100px;">
        </a>
        </div>

        <?php
                           }
                           }
                           else{ 
                           ?>


<div class="Empty cart mx-auto text-center">
    <h1 class="my-2 font-bold text-3xl ">you havn't added any favorate song 😢 </h1>
    <!-- <p class="font-gray-500 my-2 text-xl" >You probably haven't ordered a pizza yet.<br>
         To order a pizza go to the main page</p> -->
         <img  class="w-1/3 mx-auto"src="dil.png" alt=" ">
         <button class="btn px-6 py-2 rounded-full my-4" onclick="window.location.href = 'home.php';"> GO back</button>
</div>

</section>



                           <?php


                           }
                           
                           ?>

  
          </div>
        </div>
        
    </div>




<!-- it's a footer section -->
<?php
include '../common/footer.php';
?>





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
  </body>
</html>