<!-- <register class="php"></register> -->
<?php
 $showalert=false;
 $showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
     
      include '../common/config.php';
      $firstname=$_POST["firstname"];
      $lastname=$_POST["lastname"];
      $email=$_POST["email"];
      $password=$_POST["password"];
      $cpassword=$_POST["cpassword"];
      $token=bin2hex(random_bytes(15));
      $status=0;

      $extsql="Select * from user where email='$email'";
      $result=mysqli_query($conn, $extsql);
      $num=mysqli_num_rows($result);
      if($num==1){

          $showerror="user already exists";
          
      }
      else{

       
      if(($password==$cpassword)){
          $hash=password_hash($password,PASSWORD_DEFAULT);
          $sql="INSERT INTO `user` (`firstname`, `password`, `lastname`, `email`,`token`,`status`) VALUES ('$firstname', '$hash', '$lastname', '$email','$token','$status')";
          $result=mysqli_query($conn, $sql);
          if($result){    



            require_once 'vendor/autoload.php';
            use GuzzleHttp\Client;
          
          
            $body = [
              'Messages' => [
                [
                  'From' => [
                    'Email' => "arpitpal164@gmail.com",
                    'Name' => "Melody Music"
                  ],
                  'To' => [
                    [
                      'Email' => "ritikpal41@gmail.com",
                      'Name' => "Ritik"
                    ]
                  ],
                  'Subject' => "Greetings from Mailjet.",
                 
                  'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
                
                ]
              ]
            ];
          
            $client= new Client([
                'base_uri' => 'https://api.mailjet.com/v3.1/',
            ]);
          
            $response =$client->request('POST','send',[
                'json' => $body,
                'auth' => ['85ece4ee21ac7655e7908959bc2748f6','e1a1f6366b788cc3e6e246088be8db4d']
            ]);
          
            if($response->getStatusCode() == 200){
                $body = $response->getBody();
                $response = json_decode($body);
                if ($response->Messages[0]->Status == 'success'){
                    echo "email sent";
                }
            }
          
            header("location: login.php");

          }

      }
      else{
          $showerror="Repeated password do not match";
      }
      }

}
?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   
    <title>MUSIC PLAYER</title>
    <style>
   
   
   body{
            font-family: 'Cookie', cursive;
             font-size:20px;
          }

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


@media only screen and  (min-width:451px){
  .hii{
      display: flex;

  }
} 

 

.table-row{
cursor:pointer;
}


    </style>
  </head>
  <body>

  <?php
 include '../common/config.php'; 
include '../common/nav.php';

$id=$_GET['catid'];
$categery=$_GET['categery'];
$song=false;



// $sqlf="SELECT * FROM `usersong` WHERE useremail='$useremail'AND favoratesong='$music'";
// $resultf=mysqli_query($conn,$sqlf);
// $numf=mysqli_num_rows($resultf);
// if($numf>0){
//    $already=0;
// }else{
//   $already=1;
// }

              
?>

<!-- it's a main section -->
<hr>
<div class="container row ">
  <ul class="flex">
   <li> <a href="browse.php">Melody Music </a></li>   
   <li><a href="home.php">Playlist </a></li>   
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
    
  $music=$row['music']; 
  $sqlf="SELECT * FROM `usersong` WHERE useremail='$useremail'AND favoratesong='$music'";
  $resultf=mysqli_query($conn,$sqlf);
  $numf=mysqli_num_rows($resultf);

  if(array_key_exists('button1', $_POST)) { 
    if($numf>0){  
    }else{

      $sqli="INSERT INTO `usersong` (`useremail`, `favoratesong`) VALUES ('$useremail', '$music')";
      $resulti=mysqli_query($conn, $sqli);
    }
    //  $music=$row['music']; 
    //  $sqli="INSERT INTO `usersong` (`useremail`, `favoratesong`) VALUES ('$useremail', '$music')";
    //  $resulti=mysqli_query($conn, $sqli);
  }


    ?>
<div  class="container my-3">
    <div class="media ">
        <img src="../musicpic/<?php echo $row['musicpic'];  ?>"  width="150px" height="150px" class="mr-3" alt="...">
          


        <div class="media-body ml-3">
          <h5 class="mt-0">          <?php
          $row['music'] = substr($row['music'], 0, strpos($row['music'], ".")); 
           echo $row['music']; 
           ?> 
          </h5>
          <P>  created by Melody Music |
          <?php
          $useremail = substr($useremail, 0, strpos($useremail, "@")); 
           echo $useremail; 
           ?> 
        
        
        </P>
          <!-- <button type="button" class="btn btn-danger my-3">add to favorate</button> -->
          <!--<a href="login.php" class="btn btn-danger my-3" >loggin to add in favorate</a>-->
          <?php
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){ 
              echo'<form method="post"> 
              <input type="button" name="button2" class="btn btn-danger my-3" value="loggin to add the favorate" /> 
              </form>';
               }
             else{
             
              if($numf>0){  
                echo'<form method="post"> 
                <input type="submit" name="button1" class="btn btn-danger my-3" value="your favorate" /> 
                </form>';

              }else{
                echo'<form method="post"> 
                <input type="submit" name="button1" class="btn btn-danger my-3" value="add to favorate" /> 
                </form>';
              }
          

            }
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
       
        <!-- <th scope="col">DURATION</th> -->
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

       <td ><img src="dil.png" height="30px" width="30px"></td>

        <td> 
          <?php
          $row['music'] = substr($row['music'], 0, strpos($row['music'], ".")); 
           echo $row['music']; 
           ?> 
        </td>
        <td> <?php echo $row['Elbum']; ?> </td>
        
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
      name: 'MelodyMusic',
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
 ?> 
 <li><?php echo $id; ?></li>   
 <?php
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







































function button1() {    
      $music=$row['music']; 
      $sql="INSERT INTO `usersong` (`useremail`, `favoratesong`) VALUES ('$useremail', '$music')";
      $result=mysqli_query($conn, $sql);
      if($result){     
          echo 'song added'; 
       }else{ 
        echo 'song  not added'; 
        }         
} 

if(array_key_exists('button1', $_POST)) { 




  
  button1(); 
    } 
<!-- for addd to favorate -->
<?php
   function button1() { 

    $useremail=$row['musicpic']; 
    $music=$row['music']; 
   

    $sql="INSERT INTO `user` (`useremail`, `favoratsong`) VALUES ('$useremail', '$music')";
    $result=mysqli_query($conn, $sql);
    if($result){  

    }else{

          }
    
} 


    

      $extsql="Select * from user where email='$email'";
      $result=mysqli_query($conn, $extsql);
      $num=mysqli_num_rows($result);
      if($num==1){
          $showerror="user already exists";
          
      }
      else{

       
      if(($password==$cpassword)){
          $hash=password_hash($password,PASSWORD_DEFAULT);
          $sql="INSERT INTO `user` (`firstname`, `password`, `lastname`, `email`) VALUES ('$firstname', '$hash', '$lastname', '$email')";
          $result=mysqli_query($conn, $sql);
          if($result){    
            header("location: login.php");
          }

      }
      else{
          $showerror="Repeated password do not match";
      }
      }

}
?>                   
<!-- for addd to favorate -->

<!-- hello -->


<?php
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 

        function button1() { 
            echo "This is Button1 that is jkhiggggiselected"; 
        } 

    ?> 
  
    <form method="post"> 
        <input type="submit" name="button1"
                class="button" value="Button1" /> 
    </form>



<!-- hello katam -->
<!-- here is the code of musictable.php -->


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div class="container my-3">
    <div class="media ">
        <img src="photo2.jpg"  width="150px" height="150px" class="mr-3" alt="...">

        <div class="media-body ml-3">
          <h5 class="mt-0">Punjabi Top 50</h5>
          <P>  created by ganna |Track 50</P>
          <button type="button" class="btn btn-danger my-3">PLAY ALL</button>
        </div>

      </div>
</div>






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