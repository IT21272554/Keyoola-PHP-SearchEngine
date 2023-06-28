<!DOCTYPE html>
<html>
    <head>
        <title>Create Content</title>
    </head>

    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
             <fieldset>
                <legend>Create Content</legend>
             Add Heading:<input type="text" name="heading"><br>
             Add Link:<input type="text" name="link"><br>
             Add Discription:<textarea name="dis"></textarea><br>
             <button name="btncc">Create Content</button>
             </fieldset>
        </form>

        <?php
        require 'config.php';

        if(isset($_POST["btncc"])){

            $heading = $_POST["heading"];
            $link = $_POST["link"];
            $dis = $_POST["dis"];

            $sql = "INSERT INTO content VALUES ('$heading', '$link', '$dis', '1')";

            if($con->query($sql)){
                echo "<h3>Your content is uploaded.</h3>";
            }
            else{
                echo "<h3>Error.</h3>";
            }
        }
        ?>
    </body>
</html>