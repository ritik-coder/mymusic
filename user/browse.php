
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Melody</title>

        <style>
             
          body{
            font-family: 'Cookie', cursive;
             font-size:20px;
          }
    
      
         
          .c-body {
              padding: 0;
              margin: 0;
              text-align: center;
              font-size: 10px;
          }
          .c-title {
              margin: 0px;             
          }
          .c-text {
              font-weight:bold;
          }


       
        </style>
  </head>
  <body>
    
    <!-- it's a navbar -->
    <?php
include '../common/nav.php';
?>
  


    <!-- main container -->
    
   
<?php
include '../common/config.php';
$sql="Select * from music ";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?> 
    <div class=" container browse">
      <h3 style="color:green; padding: 20px 80px 0px 0px;">TRENDING SONGS</h3>
     <div class="main-carousel"  data-flickity='{ "groupCells": true }'>

      <?php
     if($num>0){                             
      while($row= mysqli_fetch_assoc($result)){
       ?>
         <div class="carousel-cell">
         <a href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="../musicpic/<?php echo $row['musicpic'];  ?>"  alt="not availabale">
        </a>
      
      <div class="card-body c-body">
        <p class="card-title c-title"><?php
          $row['music'] = substr($row['music'], 0, strpos($row['music'], ".")); 
           echo $row['music']; 
           ?> </p>
        <p class="card-text c-text"><?php echo $row['categery'];  ?></p>
      </div>
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
                  TOP SONGS
    --------------------------------------->

     
    <?php

include '../common/config.php';

$sql="Select * from music where categery='top picks'";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?> 

    <div class="container-fluid border-bottom" style="padding-bottom: 30px; background-color: whitesmoke;">
        <h3 style="color:green; padding: 20px 80px 0px 80px;">TOP SONGS</h3>

        <div class="row" style="padding: 0px 80px;">

            <?php
     if($num>0){
                                  
      while($row= mysqli_fetch_assoc($result)){
       ?>
          <div class="col-sm-3 ">
                <div class="row border rounded shadow-sm">
                    <div class="d-lg-block">
                        <a href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
                        <img class="border rounded" src="../musicpic/<?php echo $row['musicpic']; ?>" style="max-width: 150px; height: auto;">
                        </a>
                    </div>
                    <!-- <div class="col d-flex justify-content-around flex-column position-static">
                        <p class="mb-0">Top Songs</p>
                        <p class="mb-1 text-muted"><?php echo $row['Elbum']; ?></p>
                    </div> -->
                </div>
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
include '../common/footer.php';
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
      </script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
  </body>
</html>