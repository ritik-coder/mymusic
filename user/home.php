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
        
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
         <link rel="stylesheet" href="style.css">
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

  include '../common/config.php';
  include '../common/nav.php';
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
       <div class="carousel-cell py-0" data-switch="0">
       <a href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="../musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
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

include '../common/config.php';

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
         <a href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="../musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
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

include '../common/config.php';

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
         <a href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="../musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
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

include '../common/config.php';

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
         <a href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?>   ">
         <img src="../musicpic/<?php echo $row['musicpic'];  ?>" width="100%" height="100%" alt="not availabale">
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
    
 <!-- <section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto">
      
     
          <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
            <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="/img/myprofile.jpg">
            <div class="flex-grow sm:pl-8">
              <h2 class="title-font font-medium text-lg text-gray-900">Mr. Ritik Pal</h2>
              <h3 class="text-gray-500 mb-3">Web & WordPress Developer</h3>
              <p class="mb-2" class="text-gray-800">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
              </svg>
              
              Hii Everyone, I hope you all are well My self Ritik Pal, and I am a 
              computer Science student at Bundelkhand Institute Of Engineering & Technology, Jhansi.
               I developed this pizza website for online pizza ordering and customers can easily 
               track their order This is the Forth website that I've developed and my website <a href="https://www.servergyan.com/" class="font-bold text-blue-600">"www.servergyan.com"</a> which I created for an organization Servergyan Academy that helped many of people to learn new things. </p>
              <span class="inline-flex">
                <a class="text-gray-500" href="https://www.facebook.com/profile.php?id=100041482553494">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                  </svg>
                </a>
                <a class="ml-2 text-gray-500" href="https://twitter.com/RitikPa73377769" >
           
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                  </svg>
                </a>
                <a class="ml-2 text-gray-500" href="https://www.instagram.com/ritikpal752/">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                  </svg>
                </a>
              </span>
            </div>
          </div>
   

      
    </div>
  </section> -->

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