<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
        <!-- Bootstrap CSS -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
         <link rel="stylesheet" href="user/style.css">
        <!-- <title>🎧 Melody</title> -->
        <title>Melody</title>
       <style>
          body{
            font-family: 'Cookie', cursive;
             font-size:20px;
          }
       </style>
   
  </head>
  <body >
   <!-- it's a navbar -->


<!-- some extra issue  -->
<?php

  include 'common/config.php';
  include 'common/nav.php';
  $sql="Select * from music where categery='top picks'";
  $result=mysqli_query($conn, $sql);
  $num=mysqli_num_rows($result);
?> 
     
        <!-- some extra issue  -->


    <!--------------------------------
                  TOP PICKS
    ---------------------------------->

    
    <div class=" container top-picks ">
      <h3 style="color:green; padding: 20px 80px 0px 0px;">TOP PICKS</h3>
     <div class="main-carousel "   data-flickity='{ "groupCells": true }'>


     <?php
     if($num>0){
                                  
      while($row= mysqli_fetch_assoc($result)){
       ?>
       <div class="carousel-cell" data-switch="0">
       <a href="user/musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
        </a>
         </div>
    

<?php
                           }
                           }
                           else{
                               echo "no record found";
                           }
                           
                           ?> 

    
    </div> 
    </div>
    
    <!------------------------------------
                  TRENDING SONGS
    --------------------------------------->
    <?php

include 'common/config.php';

$sql="Select * from music where categery='trending songs' ";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?> 

    <div class=" container TRENDING-SONG">
      <h3 style="color:green; padding: 20px 80px 0px 0px;">TRENDING SONGS</h3>
     <div class="main-carousel"  data-flickity='{ "groupCells": true }'>
      
      
      <?php
     if($num>0){
                                  
      while($row= mysqli_fetch_assoc($result)){
       ?>
         

         <div class="carousel-cell" data-switch="0">
         <a href="user/musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
        </a>
         </div>

<?php
                           }
                           }
                           else{
                               echo "no record found";
                           }
                           
                           ?>
      
    
    </div> 
    </div> 


    <!------------------------------------
                  TOP CHARTS
    --------------------------------------->
    <?php

include 'common/config.php';

$sql="Select * from music where categery='top charts'";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?> 

    <div class=" container Top-chart">
      <h3 style="color:green; padding: 20px 80px 0px 0px;">TOP CHARTS</h3>
     <div class="main-carousel"  data-flickity='{ "groupCells": true }'>
      
      <div class="carousel-cell">
      <img src="dummy_image.webp" width="100%" height="100%" alt="not availabale">
      </div>
      <?php
     if($num>0){
                                  
      while($row= mysqli_fetch_assoc($result)){
       ?>
         

         <div class="carousel-cell" data-switch="0">
         <a href="user/musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
        </a>
         </div>

<?php
                           }
                           }
                           else{
                               echo "no record found";
                           }
                           
                           ?>
    
    </div> 
    </div> 


    <!------------------------------------
                  NEW RELEASE
    --------------------------------------->
    <?php

include 'common/config.php';

$sql="Select * from music where categery='new release'";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?> 
    <div class="container NEW-RELEASE">
      <h3 style="color:green; padding: 20px 80px 0px 0px;">NEW RELEASE</h3>
     <div class="main-carousel"  data-flickity='{ "groupCells": true }'>
    
      <?php
     if($num>0){
                                  
      while($row= mysqli_fetch_assoc($result)){
       ?>
      

         <div class="carousel-cell" data-switch="0">
         <a href="user/musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
        </a>
         </div>

<?php
                           }
                           }
                           else{
                               echo "no record found";
                           }
                           
                           ?>
    
    </div> 
    </div> 
    

<!-- it's a footer section -->
<?php
include 'common/footer.php';
?>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    

  
<!-- script code for flicity -->

<script>

  $('.main-carousel').flickity({
    // options
    cellAlign: 'left',
    groupshell: true,
    autoplay:true,
    wrapAround: true,
    freeScroll: true,
    contain: true
  });
    $(".carousel-cell").on('click',function(e){
      var dataSwitchId=$(this).attr('data-swtich');
      console.log(dataSwitchId);
    });

      </script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
 
  </body>
</html>