<?php
SESSION_START();
?> 
   <!-- it's a navbar -->
<?php
echo'<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="home.php" style="color:red" >Melody Music</a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="home.php" style="color:white" >Home<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="browse.php" style="color:white">Browse</a>
        </li>';


        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){ 
        }else{
        echo'<li class="nav-item">
          <a class="nav-link" href="favorate.php" style="color:white" >My music</a>
        </li>';}

      echo'</ul>
      <form class="form-inline my-2 my-lg-0">';
      
      if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){ 

        echo'
        
        <a class="nav-link" href="login.php" class=" mr-md-2 ml-md-2" style="color:white">Login</a>';

         }
       else{ 

        echo'
        <a class="nav-link" href="logout.php" class=" mr-md-2 ml-md-2" style="color:white">Logout</a>';
        
        
       }
       

        echo'
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search</button>
      </form>
    </div>
  </nav>';
?>
  <!-- // <button type="button" class="btn btn-outline-success mr-md-2 ml-md-2">
        // <a href="login.php" tabindex="-1" style="color:white">login</a>
        // </button> -->