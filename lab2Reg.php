<?php
    session_start(); //Start the php session
    
    //Connect to the database
    $dbHandle = mysqli_connect("localhost", "root", "19432E19432e", "lab2");

    //Check database connection
    if(!$dbHandle) {
	    print("Could not connect to the database.");
	    print(mysqli_connect_error());

	    die(); //Kills process if unable to connect to the database
    }

    //If the submit button is pressed, check the database to see if the username exixts
    //If the username does not exist, create the new user. If the username does exist, show error
    if(isset($_POST["submit"])) {
	    $username = ($_POST["username"]); //Get username from form
            $password = ($_POST["password"]); //Get password from form
	    $sql = "SELECT * FROM lab2 WHERE username='$username'"; //Send query to database
	    $res = mysqli_query($dbHandle, $sql); //Get query results
            
	    //Checks if number of rows in the database is greater than 1,
	    //which would mean a user exists
            if(mysqli_num_rows($res) > 0) {
		    $usernameError = "Username already exists, please choose another.";
	    }
            
	    //Create query and send it to the database to create a new user
	    //Then redirect the user to the Registration Success page
	    else {
	        $query = "INSERT INTO lab2 (username, password) VALUES ('$username', '$password')";
	        $results = mysqli_query($dbHandle, $query);
                $_SESSION['username'] = $username;
	        header("location: http://192.168.56.103/regSuccess.php");
	    }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Lab 2 Registration</title>
        <meta charset = "UTF-8">
        <style>
            #usernameError {
                width: 29.1%;
                background-color: tomato;
                font-weight: bold;
                margin-top: 1%;
                margin-bottom: 1%;
	    }
        </style>
    </head>
    <body onload="document.form.reset();">
        <h1>Welcome to the Lab 2 Registration page</h1>
        <h4>Please enter a username and password.</h4><br>
	<form name="form" method="post" action="http://192.168.56.103/lab2Reg.php">
            <label for="usernameField">Username:</label><br>
            <input type="text" id="usernameField" name="username"><br><br>
            <label for="passwordField">Password:</label><br>
            <input type="password" id="passwordField" name="password"><br><br>
            <input type="submit" id="submitButton" name="submit" value="Submit">
        </form>
	<div <?php if(isset($usernameError)): ?> id="usernameError" class="visible" <?php endif ?>>
            <?php if (isset($usernameError)): ?>
		<span><?php echo $usernameError; ?></span>
                
	    <?php endif ?>
	</div>
    </body>
</html>
