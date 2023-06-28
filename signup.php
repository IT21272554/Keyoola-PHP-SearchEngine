<!DOCTYPE html>
<html>
    <head>
        <title> Keyoola Sign up </title>
    </head>

    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
            <h3>Create an account</h3>
        <fieldset>
            <legend>Your personal details</legend>
            First Name:<input type="text" name="fname" placeholder="ex: John"><br>
            Last Name:<input type="text" name="lname" placeholder="ex: Kennody"><br>
            Gender:
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <br>
            NIC Number:<input name="nic" type="text"><br>
            Date of Birth:<input name="date" type="date"><br>
        </fieldset>

        <fieldset>
            <legend>Contact Details</legend>
            Email:<input type="email" name="email" placeholder="ex: abc@kmail.com">
        </fieldset>

        <fieldset>
            <legend>Account details</legend>
            Username:<input type="text" name="username" placeholder="ex: JohnK"><br>
            Password:<input type="password" name="password"><br>
            Confirm Password:<input type="password" name="cpassword"><br>
        </fieldset>

        <fieldset>
            <legend>Agreement</legend>
            <p>I agree with Keyoola terms and conditions.</p>
            <input type="checkbox" value="Agreed" name="agree">
        </fieldset>
        <button name="caccount">Create My Account</button>
        </form>

        <?php

        require 'config.php';

        if (isset($_POST["caccount"])){

       //Take personal details
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $nic = $_POST["nic"];
        $date = $_POST["date"];

        //Take contact details
        $email = $_POST["email"];

        //Take account details
        $username = $_POST["username"];
        /*Username takes as
        a primary key*/
        $password = $_POST["cpassword"];

        //Take agreemant status
        $agree = $_POST["agree"];

        $sql = "INSERT INTO reg_data VALUES ('$fname', '$lname', '$gender', '$nic', '$date', '$email', '$username', '$password', '$agree')";

           if ($con->query($sql)){

            function redirect($url){
                ob_start();
                header('Location:'.$url);
                ob_end();
            }

            redirect('logged.html');
            
           }
           else{
            echo "<h3>Error. Unsuccessful account creation.</h3>";
           }
        }

        $con->close();
        ?>
    </body>
</html>