<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   
    <title>MUSIC PLAYER</title>
    <style>
   

      .flex{
        display: flex;
        flex-direction: row;
      }
      .flex li {
              margin: 2px 20px;
              color: black;
      }
      .flex li a{
              
              color: black;
      }
     
     tr:hover{
            background-color: white;
            transition:1s;
     }

     button{
       margin-bottom:0px;
      
     }
     #aplayer {
  overflow: hidden;
 
  position: fixed;
  bottom: 0;
  width: 100%;
}
.table-row{
cursor:pointer;
}


    </style>
  </head>
  <body>

  <?php
include '../common/nav.php';
include '../common/config.php';
$id=$_GET['catid'];
$categery=$_GET['categery'];
$song=false;
?>

<!-- it's a main section -->
<hr>
<div class="container row ">
  <ul class="flex">
   <li> <a href="#">Ganna </a></li>   
   <li><a href="#">Playlist </a></li>   
   <li>Punjabi Top 50</li>   
</ul>
</div>
<hr>


<?php

// include '../common/config.php';
// $id=$_GET['catid'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){ 
  $useremail='user';
   }
 else{ $useremail=$_SESSION['email'];}
$sql="SELECT * FROM `music` WHERE sr='$id'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
                                  
while($row= mysqli_fetch_assoc($result)){

    if(array_key_exists('button1', $_POST)) { 
      
     $music=$row['music']; 
     $sqli="INSERT INTO `usersong` (`useremail`, `favoratesong`) VALUES ('$useremail', '$music')";
     $resulti=mysqli_query($conn, $sqli);
    }


    ?>
<div  class="container my-3">
    <div class="media ">
        <img src="../musicpic/<?php echo $row['musicpic'];  ?>"  width="150px" height="150px" class="mr-3" alt="...">
          


        <div class="media-body ml-3">
          <h5 class="mt-0"><?php echo $row['music']; ?>
          </h5>
          <P>  created by ganna |<?php echo $useremail;  ?></P>
          <!-- <button type="button" class="btn btn-danger my-3">add to favorate</button> -->
          <?php
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){ 
              echo'<form method="post"> 
              <input type="button" name="button2" class="btn btn-danger my-3" value="loggin to add the favorate" /> 
              </form>';
               }
             else{
              echo'<form method="post"> 
              <input type="submit" name="button1" class="btn btn-danger my-3" value="add to favorate" /> 
              </form>';}
          ?>
          <!-- <form method="post"> 
          <input type="submit" name="button1" class="btn btn-danger my-3" value="add to favorate" /> 
          </form> -->
        </div>

      </div>
</div>

<?php
  }}

       ?>






<?php
$sql="Select * from music WHERE categery='$categery'";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result);
?>
     
<!-- it's a table section -->

<table class="table container ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" ></th>
        
        <th scope="col">TITLE</th>
        <th scope="col">ARTIST</th>
        <th scope="col">DURATION</th>
      </tr>
    </thead>
    <tbody>
    <?php
        if($num>0){
          $count=0;                        
        while($row= mysqli_fetch_assoc($result)){
          $count=$count+1;
          ?>
      <tr class="table-row" data-href="musictable.php?catid=<?php echo $row['sr']; ?>&&categery=<?php echo $row['categery']; ?> ">
          <th scope="row"><?php echo $count; ?></th>  
        <td >
       
          <img src="dil.png" height="30px" width="30px">
        </td>
        <td> <?php echo $row['music']; ?> </td>
        <td> <?php echo $row['Elbum']; ?> </td>
        <td>...</td> 
     </tr> 
                                   
         <?php
        }
       }
    else{
      echo "no record found";
       }                                  
       ?>
    
    </tbody>
  </table>
<hr>





<!-- end of backend functionalities of   music player-->




<!-- it's a footer section -->
<?php
include '../common/footer.php';
?>

  
<!-- it is a ganna slider -->

<!-- music player bar -->
<div id="aplayer"></div>


<!--start of  backend functionalities of music player-->

<?php

include '../common/config.php';
$id=$_GET['catid'];

$sql="SELECT * FROM `music` WHERE sr='$id'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
                                  
  while($row= mysqli_fetch_assoc($result)){
    
      
    ?>
<script>

const ap = new APlayer({
  container: document.getElementById('aplayer'),
  listFolded: true,
  audio: [{
      name: 'ganna',
      artist: '<?php echo $row['Elbum'];  ?>',
      url: '../music/<?php echo $row['music'];  ?>',
      cover: '../musicpic/<?php echo $row['musicpic'];  ?>'
  },
  
  ]
});

</script>


   <?php
  }}

       ?>

<!-- end of backend functionalities of   music player-->



<!-- it's a javascript -->
<script>
  $('nav ul li.btn span').click(function(){
    $('nav ul div.items').toggleClass("show");
    $('nav ul li.btn span').toggleClass("show");
  });
</script>

 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    -->


    <script>
    $(document).ready(function($) {
    $(".table-row").click(function() {
        window.document.location = $(this).data("href");
    });
});

    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>

