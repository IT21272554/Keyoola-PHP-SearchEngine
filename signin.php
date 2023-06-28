<!DOCTYPE html>
<html>
    <head>
        <title>Keyoola Sign in</title>
    </head>

    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
             <input type="text" name="username" placeholder="username"><br>
             <input type="password" name="password" placeholder="password"><br>
             <button name="btnSignin">Sign in</button>
        </form>

        <?php
        require 'config.php';

       

        if (isset($_POST["btnSignin"])){

            $username = $_POST["username"];
            $password = $_POST["password"];
                
            $sql = "SELECT username, password FROM reg_data WHERE username = '$username' AND password = '$password'";

            $result = mysqli_query($con, $sql);
            
            $count = mysqli_num_rows($result);

            if ($count == 1){

                function redirect($url){
                         ob_start();
                         header('Location:'.$url);
                         ob_end();
                }

                redirect('logged.html');
            }
            else{
                echo "<h3>Wrong username or password!</h3>";
            }
        }
        $con->close();
        ?>
    </body>
</html>