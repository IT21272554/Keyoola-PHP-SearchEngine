<!DOCTYPE html>
<html>
  <head> <title>Keyoola</title> </head>
<body>
<style>
.search{
margin: 0 auto;
text-align: center;
}
.search h1{
margin: 50px 0px 20px 0px;
}
.search input[type = text]{
width: 60%;
border-radius:30px;
outline: none;
padding-left:20px;
padding-top:20px;
padding-bottom:10px;
border: solid 3px #0080ff;
}


.search button{
    font-size: 18px;
    font-weight: bold;
    background: rgb(217, 13, 173);
    width: 160px;
    padding: 16px;
    margin: 20px;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    color: #fff;
    border-radius: 30px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(87, 75, 75, 0.1);
    
  }
  .search button:hover, .search button:focus, .search button:active{
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<a href="signin.php" class="log">Sign in</a>
<a href="signup.php" class="log">Sign up</a>
<div class="search">
<img src="Keyoola Network.jpg" height="350px">
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
<input type="text" id="search" name="search" placeholder="Search...">
<button name="sec">Search</button>
</form>
</div>

<?php

   require ('config.php');

   if(isset($_GET["sec"])){
    
    $keyword = $_GET["search"];

    $sql = "SELECT * FROM content WHERE heading LIKE '%$keyword%' OR discription LIKE '%$keyword%'";

    $result = $con->query($sql);

    $count = mysqli_num_rows($result);

    if($count >= 1){
         
      while($row = $result->fetch_assoc()){
        
        echo "<center><i>".$row["link"]."</i></center>";
        echo "<center><a href=".$row["link"].">".$row["heading"]."</a></center>";
        echo "<center><p>".$row["discription"]."</p></center><br><br>";
      }
    }
    else{
      echo "<p style=\"text-align: center; font-size: 15px;\">Your search - <b>".$keyword."</b> - did not match any documents.</p>";
      echo "<center><img src=\"animated-girl.gif\"></center>";
    }
   }
?>
<br><br><br><br><br><br><br><br><br><br><br>
<hr>
<p style="; text-align:center;"><b>&copy Keyoola LLC</b></p>
</body>
</html>